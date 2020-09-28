<?php
	
class ServerInfoController{

	public function get_uptime(){

        $get_uptime = file_get_contents('/proc/uptime');
        $uptime = explode(' ', $get_uptime);

        $data = array();
        $status = "failed";

        if($uptime){
            $data['uptime_days'] = floor($uptime[0] / 86400);
            $data['uptime_hours'] = floor(($uptime[0] / 3600) % 24);
            $data['uptime_minutes'] = floor(($uptime[0] / 60) % 60);
            $data['uptime_seconds'] = ($uptime[0] % 60);
            $status = "ok";
        }

        $result['data'] = $data;
        $result['status'] = $status;
        return json_encode($result);
    }

    public function get_cpu_load(){

        $get_cpuload = file_get_contents('/proc/loadavg');
        $cpuload = explode(' ', $get_cpuload);

        $data = array();
        $status = "failed";
        if($cpuload){
            $data['cpu_1'] = $cpuload[0];
            $data['cpu_5'] = $cpuload[1];
            $data['cpu_15'] = $cpuload[2];
            $status = "ok";
        }

        $result['data'] = $data;
        $result['status'] = $status;
        return json_encode($result);
    }

    public function get_memory(){

        $get_meminfo = file('/proc/meminfo');

        $data = array();
        $status = "failed";
        if($get_meminfo){
            $meminfo_total = filter_var($get_meminfo[0], FILTER_SANITIZE_NUMBER_INT);
            $meminfo_cached = filter_var($get_meminfo[2], FILTER_SANITIZE_NUMBER_INT);
            $meminfo_free = filter_var($get_meminfo[1], FILTER_SANITIZE_NUMBER_INT);

        if ($meminfo_total >= 10485760) {
            $mem_total = round(($meminfo_total / 1048576), 2);
            $mem_cached = round(($meminfo_cached / 1048576), 2);
            $mem_free = round((($meminfo_free + $meminfo_cached) / 1048576), 2);
            $mem_multiple = 'GB';
        } else {
            $mem_total = round(($meminfo_total / 1024), 2);
            $mem_cached = round(($meminfo_cached / 1024), 2);
            $mem_free = round((($meminfo_free + $meminfo_cached) / 1024), 2);
            $mem_multiple = 'MB';
        }

        
        $data['total'] = $mem_total;
        $data['cached'] = $mem_cached;
        $data['free'] = $mem_free;
        $data['multiples'] = $mem_multiple;
        $status = "ok";
        }
        
        $result['data'] = $data;
        $result['status'] = $status;
        return json_encode($result);
    }

    public function disk_usage(){

        $disk_space_total = disk_total_space('/');
        $disk_space_free = disk_free_space('/');

        if ($disk_space_total > 10737418240) {
            $disk_total = round(($disk_space_total / 1073741824), 2);
            $disk_free = round(($disk_space_free / 1073741824), 2);
            $disk_multiple = 'GB';
        } else {
            $disk_total = round(($disk_space_total / 1048576), 2);
            $disk_free = round(($disk_space_free / 1048576), 2);
            $disk_multiple = 'MB';
        }

        $data = array();
        $data['total'] = $disk_total;
        $data['free'] =  $disk_free;
        $data['multiples'] =  $disk_multiple;

        $result['data'] = $data;
        $result['status'] = "ok";
        return json_encode($result);
        
    }
    public function about_server(){

        $distros = array(
            'debian_version' => 'Debian',
            'centos-release' => 'CentOS',
            'lsb-release' => 'Ubuntu',
            'redhat-release' => 'Redhat',
            'fedora-release' => 'Fedora',
            'SuSE-release' => 'SUSE',
            'gentoo-release' => 'Gentoo'
        );
        $distro = 'Unknown';

        foreach ($distros as $distro_release => $distro_name) {
            $release_file = '/etc/' . $distro_release;
            if (file_exists($release_file)) {
                $distro = $distro_name;
            }
        }

        $webserver_info = explode('/', $_SERVER['SERVER_SOFTWARE']);
        $webserver = $webserver_info[0];

        $get_cpuinfo = file('/proc/cpuinfo');
        $get_cpu_model = explode(':', $get_cpuinfo[4]);
        $cpu_model = $get_cpu_model[1];

        $data = array();
        $data['hostname'] = gethostname();
        $data['ip_server'] = $_SERVER['SERVER_ADDR'];
        $data['os'] = $distro;
        $data['web_server'] = $webserver;
        $data['cpu_model'] = $cpu_model;

        $result['data'] = $data;
        $result['status'] = "ok";
        return json_encode($result);
    }

}
?>