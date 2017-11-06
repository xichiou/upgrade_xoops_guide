
$str='';

if (function_exists('posix_getpwuid')){
  $fid=posix_getpwuid(fileowner(XOOPS_ROOT_PATH."/mainfile.php"));
  $uid_name=$fid['name'];
}
else
  $uid_name='apache';

if (function_exists('posix_getgrgid')){
  $fid=posix_getgrgid(fileowner(XOOPS_ROOT_PATH."/mainfile.php"));
  $gid_name=$fid['name'];
}
else
  $gid_name='apache';


$str.='目前XOOPS版本:'.XOOPS_VERSION.'<BR>';
$str.='網站所在的目錄:'.XOOPS_ROOT_PATH.'<BR>';
$str.='XOOPS_PATH:'.XOOPS_PATH.'<BR>';
$str.='XOOPS_VAR_PATH:'.XOOPS_VAR_PATH.'<BR>';
$str.='<BR>';

$str.='-----------------------------------'.'<BR>';
$str.='0.先備份資料庫與程式'.'<BR>';
$str.='-----------------------------------'.'<BR>';
$str.='cd /tmp'.'<BR>';
$str.='mysqldump '.XOOPS_DB_NAME.' -u root -p | gzip >'.XOOPS_DB_NAME.'_sql.tar'.'<BR>';
$str.='<BR>';


$str.='-----------------------------------'.'<BR>';
$str.='1.登入linux執行以下指令'.'<BR>';
$str.='-----------------------------------'.'<BR>';
$str.='cd /tmp'.'<BR>';
$str.='wget "http://120.115.2.90/modules/tad_uploader/index.php?op=dlfile&cfsn=146&cat_sn=16&name=xoopscore25-2.5.9_tw_for_upgrade_20170803.zip" -O xoopscore25-2.5.9_tw_for_upgrade_20170803.zip'.'<BR>';
$str.='unzip xoopscore25-2.5.9_tw_for_upgrade_20170803.zip'.'<BR>';
$str.='chown -R '.$uid_name.'.'.$gid_name.' XoopsCore25-2.5.9_for_upgrade'.'<BR>';
$str.='cd XoopsCore25-2.5.9_for_upgrade'.'<BR>';
$str.="rm -rf ".XOOPS_ROOT_PATH."/modules/system".'<BR>';
// $str.='command_cp=`which --skip-alias cp`'.'<BR>';
$str.='/bin/cp -rf htdocs/* '.XOOPS_ROOT_PATH.'<BR>';
$str.='/bin/cp -rf xoops_data/* '.XOOPS_VAR_PATH.'<BR>';
$str.='/bin/cp -rf xoops_lib/* '.XOOPS_PATH.'<BR>';
$str.='chmod 777 '.XOOPS_ROOT_PATH.'/mainfile.php'.'<BR>';
$str.='chmod 777 '.XOOPS_VAR_PATH.'/data/secure.php'.'<BR>';
$str.='<BR>';

$str.='-----------------------------------'.'<BR>';
$str.='2.完成以上程序後，請開啟以下連結進行更新'.'<BR>';
$str.='-----------------------------------'.'<BR>';
$str.='<a href="'.XOOPS_URL.'/upgrade">'.XOOPS_URL.'/upgrade</a>'.'<BR>';
$str.='<BR>';

$str.='-----------------------------------'.'<BR>';
$str.='3.登入linux執行以下指令'.'<BR>';
$str.='-----------------------------------'.'<BR>';
$str.='chmod 444 '.XOOPS_ROOT_PATH.'/mainfile.php'.'<BR>';
$str.='chmod 444 '.XOOPS_VAR_PATH.'/data/secure.php'.'<BR>';
$str.="rm -rf ".XOOPS_ROOT_PATH."/upgrade".'<BR>';
$str.='<BR>';
$str.='<BR>';
$str.='<BR>';
echo $str;

