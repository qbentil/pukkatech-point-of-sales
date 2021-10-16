<?php
/**
 * Handles backing up database automatically and emailing it to me.
 */
date_default_timezone_set('America/Chicago'); // necessary in some server environments before using any Date/Time functions.
$timestart = microtime(true);

config(); // sets up constants and configurations for database credentials, error handling, etc. including using local environment specific options.

$filename = backup_tables(DB_HOST, DB_USER, DB_PASS, DB_NAME); // backs up data.

$execution = round(microtime(true) - $timestart, 2);
echo 'Backup saved to ' . $filename . "\n";
echo 'Backup took ' . $execution . ' seconds.' . "\n";
echo 'Filesize is ' . get_filesize($filename) . "\n";
$timestart = microtime(true);
$result = email_file($filename, $execution);
$good = ($result === 0) ? 'Email backup failed' : 'Email backup successfully sent to ' . $result . ' recipient';
$good .= ($result > 1) ? "s.\n" : ".\n";
echo $good;
$execution = round(microtime(true) - $timestart, 2);
echo "Emailing took $execution seconds.\n";

/**
 * Backs up the entire Database or a list of tables.
 *
 * Adapted from [here](http://davidwalsh.name/backup-mysql-database-php) with changes to
 * convert to using MySQLi instead of MySQL, and with a change to use GZ compression which
 * resulted in about an 600+% improvement in the amount of time it took to email the file, at
 * the cost of about a 130% increase in time to generate backup. So that's a tossup. Its easy
 * to disable.
 *
 * @param string $host Host
 * @param string $user Username
 * @param string $pass Password
 * @param string $name Database name
 * @param string|array $tables Defaults to "*" which gets all tables, otherwise, use either an array or a comma-delimited list of table names to backup.
 * @return string Filename of file saved.
 */
function backup_tables($host,$user,$pass,$name ,$tables = '*')
{

  $connection = mysqli_connect($host, $user, $pass, $name);
    if (mysqli_connect_error()){
        trigger_error("Connection Error: " . mysqli_connect_error());
    }
	$return = '';

	//get all of the tables
	if($tables == '*')
	{
		$tables = array();
		$result = mysqli_query($connection, 'SHOW TABLES');
		while($row = mysqli_fetch_array($result))
		{
			$tables[] = $row[0];
		}
	}
	else
	{
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	}

	//cycle through
	foreach($tables as $table)
	{
		$result = mysqli_query($connection, 'SELECT * FROM '.$table);
		$num_fields = mysqli_num_fields($result);

		$return.= 'DROP TABLE '.$table.';';
		$row2 = mysqli_fetch_array(mysqli_query($connection, 'SHOW CREATE TABLE '.$table));
		$return.= "\n\n".$row2[1].";\n\n";

		for ($i = 0; $i < $num_fields; $i++)
		{
			while($row = mysqli_fetch_array($result))
			{
				$return.= 'INSERT INTO '.$table.' VALUES(';
				for($j=0; $j<$num_fields; $j++)
				{
					$row[$j] = addslashes($row[$j]);
					$row[$j] = preg_replace("/\\n/","\\n",$row[$j]);
					if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
					if ($j<($num_fields-1)) { $return.= ','; }
				}
				$return.= ");\n";
			}
		}
		$return.="\n\n\n";
	}

	//save file
	
	if (!file_exists('database_backups')) {
 	   mkdir('database_backups', 0777, true);
 	}
	
	$filename = 'database_backups/db-backup-'.time().'-'.(md5(implode(',',$tables))).'.sql.gz';
	$handle = fopen($filename,'w+');
	$gzdata = gzencode($return, 9);
	fwrite($handle,$gzdata);
	fclose($handle);
	return $filename;
}

/**
 * Gets the filesize as pretty string.
 * Adapted from [here](http://stackoverflow.com/a/5501447/2274842)
 */
function get_filesize($filename) {

    $bytes = filesize($filename);
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
}


/**
 * Emails file.
 *
 * Implementation agnostic; originally built using swiftmailer but could use anything.
 *
 * @param string $filename Filename of backup file to attach.
 * @return int Number of recipients successfully sent to (0, which is equivalent to false, means failure).
 */
function email_file($filename, $execution){
	# Put your own email code in here.
}

/**
 * Sets up configuration information.
 */
function config() {

	define('BASE_PATH', dirname(__FILE__));

	// using the local-config file allows to customize these vars for environmental specific settings
	// while keeping this primary file under source control

	if ( file_exists( dirname( __FILE__ ) . '/local-config.php' ) ) {
	    require( dirname( __FILE__ ) . '/local-config.php' );
	} else {
	// no defined local-config.php, define our live site variables here:

	    define('SITE_URL', "");
	    define('DB_HOST', "localhost");
	    define('DB_USER', "root");
	    define('DB_PASS', "");
	    define('DB_NAME', "shop");
	    define('SITE_DIR', __DIR__);
	    // any additional constants
	}
	// values to mockup the HTTP values, necessary for integration with third-party error tracker
	$_SERVER['HTTP_HOST'] = SITE_URL;
	$_SERVER['SERVER_NAME'] = SITE_URL;
	$_SERVER['REQUEST_METHOD'] = 'GET';
	$_SERVER['REQUEST_URI'] = 'backup.php';
	$_SERVER['REMOTE_ADDR'] = '127.0.0.1';
	$_SERVER['SCRIPT_FILENAME'] = 'backup.php';
	$_SERVER['SCRIPT_NAME'] = 'backup.php';
	$_SERVER['QUERY_STRING'] = '';
	$_SERVER['CONTENT_TYPE'] = 'text/html';
	
	// include any additional files, such as error-handling functions.
}

function site_url() {
	//return SITE_URL;
}


?>