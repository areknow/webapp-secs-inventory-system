<?PHP
include ('../php/con.php');
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>SECS Inventory | Add</title>
        <meta name="description" content="SECS INVENTORY">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/normalize.css">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="http://cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.5/css/dataTables.responsive.css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>        
        <script src="http://cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js"></script>          
        <script src="http://cdn.datatables.net/responsive/1.0.5/js/dataTables.responsive.js"></script>    
		<script type='text/javascript' src='../js/placeholder.shim.js'></script>   
		<script src="../js/main.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		<div class="nav">
			<div class="block">
				<div class="tile">SECS Inventory System</div>
			</div>
			<div class="block right menu-button">
				<div class="tile"><i class="fa fa-ellipsis-v"></i></div>
			</div>
			<div class="sidemenu">
				<div class="sidemenu-item sidemenu-top">&nbsp;</div>
				<a href="..">Computer Inventory</a>
				<a href="../assignments">EC Room Assignments</a>
				<a href="../rooms">EC Rooms</a>
				<a href="../faculty">Faculty</a>
				<a href="../oldrooms">Old Lab Rooms</a>
				<a href="../postmovelab">Post Move Lab Assignments</a>
				<a href="../printers">Printers</a>
				<a href="../purchase">Purchase Info</a>
				<a href="../scanners">Scanners</a>
				<a href="../add" class="selected">Add Item</a>
				<form id="side-search" action="../search/index.php" method="post">
					<input id="side-input" type="text" placeholder="Enter Tag" name="side-tag"><button name="side-submit" type="submit"><i class="fa fa-search"></i></button>
				</form>
			</div>
			<div class="sidemenu-overlay"></div>
		</div>
		<div class="content">
			<form id="add-new" action="#" method="post">
				<?PHP
				if (isset($_POST['submit'])) {
					$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

					$tag = $_POST['tag'];
					$move = $_POST['move'];
					$desc = $_POST['desc'];
					$serial = $_POST['serial'];
					$loc = $_POST['loc'];
					$room = $_POST['room'];
					$fac = $_POST['fac'];
					$accs = $_POST['accs'];
					$os = $_POST['os'];
					$domain = $_POST['domain'];

					$sql= "INSERT INTO `Computers` (
						`Tag`, 
						`Move Status`, 
						`Description`, 
						`Serial Number`, 
						`Current Location`,
						`New Room #`,
						`Faculty`,
						`Accessories`,
						`OS`,
						`Domain`
					) VALUES (
						'$tag',
						'$move',
						'$desc',
						'$serial',
						'$loc',
						'$room',
						'$fac',
						'$accs',
						'$os',
						'$domain'
					)";

					if (!mysql_query($sql, $db)) {
						die('Error: ' . mysql_error());
					}
					echo "Item successfuly added to the inventory";
				}
				?>
				<div><input placeholder="Tag" type="text" name="tag"><i class="fa fa-tag"></i></div>
				<div><input placeholder="Move Status" type="text" name="move"><i class="fa fa-archive"></i></div>
				<div><input placeholder="Description" type="text" name="desc"><i class="fa fa-info-circle"></i></div>
				<div><input placeholder="Serial Number" type="text" name="serial"><i class="fa fa-barcode"></i></div>
				<div><input placeholder="Current Location" type="text" name="loc"><i class="fa fa-location-arrow"></i></div>
				<div><input placeholder="New Room" type="text" name="room"><i class="fa fa-sign-out"></i></div>
				<div><input placeholder="Faculty" type="text" name="fac"><i class="fa fa-user"></i></div>
				<div><input placeholder="Accessories" type="text" name="accs"><i class="fa fa-wrench"></i></div>
				<div><input placeholder="Operating System" type="text" name="os"><i class="fa fa-floppy-o"></i></div>
				<div><input placeholder="Domain" type="text" name="domain"><i class="fa fa-cloud"></i></div>
				<div>
					<button name="submit">SAVE</button>
					<button class="button-right" name="reset">CLEAR</button>
				</div>
			</form>
		</div>
    </body>
</html>
