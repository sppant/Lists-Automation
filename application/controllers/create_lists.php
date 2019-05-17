<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create_lists extends CI_Controller {

	 /* @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('customers');
		$data['customers'] = $this->customers->get_customers_name();
		$data['show'] = $this->customers->get_shows_name();
		$data['spot_type'] = $this->customers->get_spot_type();
		$data['timeslot'] = $this->customers->get_timeslots();
		$this->load->view('new_spot', $data);
	}

//create folder listes[date]/[date]/text
	public function create($from_date,$to_date)
	{
		$this->load->model('spots');
		$data['scheduled'] = $this->spots->fetch_scheduled_posts($from_date,$to_date);
		foreach($data['scheduled'] as $each){

		if (!file_exists('/Users/***/'. date("Y-m-d") .'/'.$each['spot_date'].'/text')) {
    mkdir('/Users/***/'. date("Y-m-d") .'/'.$each['spot_date'].'/text', 0777, true);
}
chmod('/Users/***/'. date("Y-m-d") .'/'.$each['spot_date'].'/text', 0777);


if (!file_exists('/Users/***/'. date("Y-m-d") .'/'.$each['spot_date'].'/clips')) {
mkdir('/Users/***/'. date("Y-m-d") .'/'.$each['spot_date'].'/clips', 0777, true);
}
chmod('/Users/***/'. date("Y-m-d") .'/'.$each['spot_date'].'/clips', 0777);

 }
 //Use the function is_file to check if the file already exists or not.
 foreach($data['scheduled'] as $each){

 	$file = '/Users/***/'. date("Y-m-d") .'/'.$each['spot_date'].'/text/'.$each['spot_time'].'.txt';
     $contents = $each['spot_link']."";
     //Save our content to the file.
     file_put_contents($file, $contents . "\n", FILE_APPEND);
 }

	//applescript!!!
	$arg3 = date("Y-m-d");
	$last_item = end($data['scheduled']);
	$arg4 = ($last_item['spot_time']);
	$arg5 = ($last_item['spot_date']);


	foreach($data['scheduled'] as $each){
		$arg1 = $each['spot_date'];
		$arg2 = $each['spot_time'];
		exec('unset DYLD_LIBRARY_PATH ;');
		putenv('DYLD_LIBRARY_PATH');
		putenv('DYLD_LIBRARY_PATH=/usr/bin');

		//applesctip
	$cmd = "osascript -e ' 	set dat to \"$arg1\"
	set hour to \"$arg2\"
	set cur_date to \"$arg3\"
	set ftime to \"$arg4\"
	set fdate to \"$arg5\"

	set open_file to ( \"Macintosh HD:Users:***\" & cur_date & \":\" & dat & \":text:\" & hour & \".txt\")
	set save_file to (\"Macintosh HD:Users:***\"  & cur_date & \":\" & dat & \":clips:\" & hour)

		tell application \"OnTheAir Video\"
		activate
		tell playlist 1
			open file (open_file)
			update
			if (dat = fdate) and (hour = ftime) then
			quit (save in (save_file))
			else
			close (save in (save_file))
			end if
		end tell
		# quit
	end tell
' \"$arg1\" \"$arg2\" \"$arg3\" \"$arg4\" \"$arg5\"";

				exec($cmd);
	 }
	 $rdata = array(
	                    'list_confirm'  => TRUE
	                );
	 $this->session->set_userdata($rdata);
	 	 redirect(base_url() . "index.php/main/");

}
}
