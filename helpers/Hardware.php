<?php

/**
 * Description of Util
 *
 * @author develop
 */
class Hardware {

    static function memory_get_usage() {
        $pid = getmypid();
        exec("ps -o rss -p $pid", $output);
        return $output[1] * 1024;
    }

    static function get_server_memory_usage() {
        $free = shell_exec('free');
        $free = (string) trim($free);
        $free_arr = explode("\n", $free);
        $mem = explode(" ", $free_arr[1]);
        $mem = array_filter($mem);
        $mem = array_merge($mem);
        $memory_usage = $mem[2] / $mem[1] * 100;
        return $memory_usage;
    }

    static function get_server_cpu_usage() {
        $load = sys_getloadavg();
        return $load[0];
    }

    static function diskfree($diretorio) {
        $total = disk_free_space("$diretorio");
        return settype($total, "integer") . '%';
    }

    static function disktotal($diretorio) {
        $total = disk_total_space("$diretorio");
        return settype($total, "integer") . '%';
    }

    static function diskprogress() {
        $diskfree = disk_free_space("/srv/http");
        /* and get disk space total (in bytes)  */
        $disktotal = disk_total_space("/srv/http");
        /* now we calculate the disk space used (in bytes) */
        $diskusado = $disktotal - $diskfree;
        /* percentage of disk used - this will be used to also set the width % of the progress bar */
        $diskporgress = sprintf('%.2f', ($diskusado / $disktotal) * 100);
        return $diskporgress;
    }

    static function getCpuUsage() {
        $dat = getrusage();
        $dat["ru_utime.tv_usec"] = ($dat["ru_utime.tv_sec"] * 1e6 + $dat["ru_utime.tv_usec"]) - PHP_RUSAGE;
        $time = (microtime(true) - PHP_TUSAGE) * 1000000;

// cpu per request
        if ($time > 0) {
            $cpu = sprintf("%01.2f", ($dat["ru_utime.tv_usec"] / $time) * 100);
        } else {
            $cpu = '0.00';
        }

        return $cpu;
    }

    function formatSize($bytes) {
        $types = array('B', 'KB', 'MB', 'GB', 'TB');
        for ($i = 0; $bytes >= 1024 && $i < ( count($types) - 1 ); $bytes /= 1024, $i++)
            ;
        return( round($bytes, 2) . " " . $types[$i] );
    }

}
