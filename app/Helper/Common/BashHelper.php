<?php
/**
 * Created by PhpStorm.
 * User: Maple.xia
 * Date: 29/11/2017
 * Time: 7:20 PM
 */

namespace App\Helper\Common;

class BashHelper{

    /**
     * 创建虚拟主机
     * @param $server_name
     * @param $project_name
     * @param $path
     * @return string
     */
    public static function createVirtualHost($server_name,$project_name,$path){

        $conf_file = "/Applications/MAMP/conf/apache/extra/httpd-vhosts.conf";
        $num = self::getNum8keywordSearchFile($project_name,$conf_file);

        if($num){
            return $num;
        }else{
            $script = 'VHOST="# '. $project_name .'
<VirtualHost *:80>
    DocumentRoot \"/Users/summerway/workSpace/DevDock/projects/'. $path .'\"
    ServerName '. $server_name .'
    ServerAlias '. $server_name .'
    <Directory \"/Users/summerway/workSpace/DevDock/projects/'. $path .'\">
        Options Indexes FollowSymLinks
        AllowOverride All
        Order deny,allow
        Allow from all
    </Directory>
    ErrorLog \"logs/'. $server_name .'-error_log\"
    CustomLog \"logs/'. $server_name .'-access_log\" common
</VirtualHost>"
            echo "Add virtual host to file '.$conf_file.'";
            sudo -- sh -c "echo \'$VHOST\' >> '.$conf_file.'";
        ';
            shell_exec($script);
            return self::getNum8keywordSearchFile($project_name,$conf_file);
        }
    }

    /**
     * 移除虚拟主机
     * @param $project_name
     * @return string
     * @throws \Exception
     */
    public static function removeVirtualHost($project_name){
        $conf_file = "/Applications/MAMP/conf/apache/extra/httpd-vhosts.conf";
        $num = self::getNum8keywordSearchFile($project_name,$conf_file);
        if(!$num){
            //throw new \Exception($conf_file."中无找到匹配的项目");
            return true;
        }

        $range = $num.','.($num+14);
        $script = ' echo "Remove '.$project_name.' from file '.$conf_file.'";
                        sudo -- sh -c "sed -i \'\' $\''.$range.'d\' '.$conf_file.'"';
        return shell_exec($script);
    }

    /**
     * 创建host
     * @param $server_name
     * @return string
     */
    public static function createHost($server_name){
        $hosts_line = "127.0.0.1       ".$server_name;
        $num = self::getNum8keywordSearchFile($hosts_line,'/etc/hosts');
        if($num){
            return $num;
        }else{

            $script = ' echo "Add '.$hosts_line.' to file /etc/hosts";
                        sudo -- sh -c "sed -i \'\' $\'/# myprojects/a \\\\\\\\\n'.$hosts_line.'\\\\\\\\\n \' /etc/hosts"';
            shell_exec($script);
            return self::getNum8keywordSearchFile($hosts_line,'/etc/hosts');
        }
    }

    /**
     * 移除host
     * @param $server_name
     * @return string
     * @throws \Exception
     */
    public static function removeHost($server_name){
        $hosts_line = "127.0.0.1       ".$server_name;
        $num = self::getNum8keywordSearchFile($hosts_line,'/etc/hosts');
        if(!$num){
            //throw new \Exception("无找到匹配的host");
            return true;
        }

        $script = ' echo "Remove '.$hosts_line.' from file /etc/hosts";
                        sudo -- sh -c "sed -i \'\' $\''.$num.'d\' /etc/hosts"';
        return shell_exec($script);
    }

    /**
     * 重启apache
     * @return string
     */
    public static function restartApache(){
        $script = "/Applications/MAMP/bin/restartApache.sh  > 1 &";
        return shell_exec($script);
    }

    /**
     * 获取关键词在文件中行号
     * @param $keyword
     * @return bool
     */
    public static function getNum8keywordSearchFile($keyword,$file){
        $script = "sed -n '/{$keyword}/=' {$file}";
        $num = intval(shell_exec($script));
        return $num ? : false;
    }

    public static function sudo($script){
        //$exec = "sudo -- sh -c "
    }
}