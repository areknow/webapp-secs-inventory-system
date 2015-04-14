<?PHP
include ('../php/con.php');
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>SECS Inventory | Printers</title>
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
				<a href="../printers" class="selected">Printers</a>
				<a href="../purchase">Purchase Info</a>
				<a href="../scanners">Scanners</a>
				<a href="../add">Add Item</a>
				<form id="side-search" action="../search/index.php" method="post">
					<input id="side-input" type="text" placeholder="Enter Tag" name="side-tag"><button name="side-submit" type="submit"><i class="fa fa-search"></i></button>
				</form>
			</div>
			<div class="sidemenu-overlay"></div>
		</div>
		<div class="content">
			<table id="computers" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<td>Tag</td>
						<td>Faculty</td>
						<td>Move Status</td>
						<td>Connection Type</td>
						<td>Connected To</td>
						<td>Serial Number</td>
						<td>Current Location</td>
						<td>New Room</td>
						<td>Comments</td>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</tfoot>
				<tbody>
				<?PHP $query = mysql_query("SELECT * FROM `Printers`");
				while ($results = mysql_fetch_array($query)) { ?>
					<tr>
						<td><?PHP echo $results['Tag'] ?></td>
						<td><?PHP echo $results['Faculty'] ?></td>
						<td><?PHP echo $results['Move Status'] ?></td>
						<td><?PHP echo $results['Connection Type'] ?></td>
						<td><?PHP echo $results['Connected To'] ?></td>
						<td><?PHP echo $results['Serial Number'] ?></td>
						<td><?PHP echo $results['Current Location'] ?></td>
						<td><?PHP echo $results['New Room #'] ?></td>
						<td><?PHP echo $results['Comments'] ?></td>
					</tr>
				<?PHP } ?>
				</tbody>
			</table>
		</div>
    </body>
</html>
