<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Tibetan Handicrafts and Bead Store</title>
	<style type="text/css" media="screen">
	/* <![CDATA[ */
	@import url(project.css);
	/* ]]> */
</style>
</head>
<body class="homePage">
	<header>
		<div class= "intro">
			<h1> Tibetan Handicrafts and Bead Store </h1>
			<h3> Every decade needs its own manual of handicraft.</h3>
		</div>
	</header>

	<h3><a href="http://sand.truman.edu/~ns7442/project-website/index.html">Home Page</a>
					</h3>

	<div class = "allproduct">
		<section class = "product">
			<h2> Mandala</h2>
			<div class="image-area left">
				<img src="img/mandala1.jpg" alt="building"/>
			</div>
			<div class="text-box">
				<div class="text-box-content">
					<h3>The Thanka</h3>
					<p>
						 A true masterpiece, this painting is the perfect addition to your home, meditation area, or altar space. Thangka depicts a beautifully detailed 21 Tara design and comes unframed and ready for Western style framing.

						 <?php

						include("dbInfo.inc");

						//A function called to print the HTML form.
						function print_form() 
						{
   							 $time = time();
    						 echo <<<END

        					 <form action="$_SERVER[PHP_SELF]" method="post">

        					<input type="hidden" name="Time" value="$time">
        					</br>
					        Size:
					        <select name="size">
    							<option value="small">Small - $2.00</option>
    							<option value="meduim">Medium - $4.00</option>
    							<option value="large">Large - $5.00</option>
							 </select>
					
							<form action="index.html">
           				 		<input type="submit" value="Add to Cart"/>
        					</form>

END;
					}

					// A function to process the HTML form. 
					function process_form() 
					{
					    $owner = $_POST['owner'];
					    $location = $_POST['location'];
					    $year = $_POST['year'];

					    try 
					    {
					        $conn = new PDO("mysql:host=mysql.truman.edu;dbname=ns7442CS315", "ns7442", "chohghot");
					        // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
					        // set the PDO error mode to exception
					        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					        // prepare sql and bind parameters
					        $stmt = $conn->prepare("INSERT INTO rent (SN, owner, location, year)
					                                VALUES (NULL, :owner, :location, :year)");
					        $stmt->bindParam(':owner', $owner);
					        $stmt->bindParam(':location', $location);
					        $stmt->bindParam(':year', $year);

					        $stmt->execute();
					    }
					    catch(PDOException $e)
					    {
					        echo "Error: " . $e->getMessage();
					    }

					// end the DB connection.
					$conn = null;
					}

					if (isset($_POST['stage']) && ('process' == $_POST['stage'])) {
					    process_form();
					} else {
					    print_form();
					}

					?>
					</p>
				</div>
			</div>	
		</section>

		<section class = "product">
			<div class="image-area right">
				<img src="img/mandala2.jpg" alt="building"/>
			</div>
			<div class="text-box">
				<div class="text-box-content">
					<h3>The Mantra </h3>
						<p>
							Beautiful Tibetan banner that features the 8 Auspicious Symbols along with the mantra of compassion, Om Mani Padme Hum.  This mantra invokes the powerful benevolent attention and blessings of Chenrezig, the embodiment of compassion.</br>
							Size:
					        <select name="size">
    							<option value="small">Small - $2.00</option>
    							<option value="meduim">Medium - $4.00</option>
    							<option value="large">Large - $5.00</option>
							 </select> 
						
						<h4><a href="http://sand.truman.edu/~ns7442/project-website/index.html">Add to Cart</a>
					</h4>
					</p>
				</div>
			</div>	
		</section>
	</div>
</body>
</html>
