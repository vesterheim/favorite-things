<?php

class Artifacts_seeder {

	public function run($model)
	{
		$this->model = $model;

		// Uncomment the below to wipe the table clean before populating
		$this->model->truncate();

		$data = array(
			array(
				'id' => 1,
				'name' => 'Shoes',
				'identifier' => '1968.025.001',
				'description' => 'These birch bark shoes are plaited in the traditional manner using strips that are about one inch wide.  The bands are used in double thickness and comprise the sole as well as body of shoe.',
				'date' => 'ca. 1850',
				'creator' => 'Unknown',
				'source' => 'Gift of Mrs. Glenn B. Moore ',
				'dimensions' => 'Width, 4 inches; length, 9 inches',
				'status' => 1
			),
			array(
				'id' => 2,
				'name' => 'Folk Costume',
				'identifier' => 'LC4300',
				'description' => 'This bunad features a long gathered black skirt and a bodice that are covered with multi-colored embroidery. The apron is made of a dark blue plaid wool that is edged with a band that was woven on a cradle loom using a tapestry weave technique.  The long sleeved black wool jacket ends just below bust. It is bordered with embroidery and rick-rack and held in front by large gold brooch with two sizes of hanging spoons. The accompanying white linen long blouse has white floral embroidery around the collar and cuffs. There is also a close fitting black cap that is covered with embroidery in the Hallingdal style.',
				'date' => '1870-1900',
				'creator' => 'Unknown',
				'source' => 'Gift of Hallingdal Folkemuseum',
				'dimensions' => NULL,
				'status' => 1
			),
			array(
				'id' => 3,
				'name' => 'Crazy Quilt',
				'identifier' => '1968.034.002',
				'description' => 'This traditional crazy quilt was made using irregular pieces of fancy clothing and home furnishing fabrics. The pieces are hand-basted to 12" foundations blocks, with decorative embroidery.  The center block has a diamond medallion of peachy-brown velvet and a ribbon with two stag heads woven into it.',
				'date' => '1890-1930',
				'creator' => 'Mary Christopher',
				'source' => 'Gift of Fred Biermann',
				'dimensions' => 'Length, 61.5 inches; width, 61.5 inches',
				'status' => 1
			),
			array(
				'id' => 4,
				'name' => 'Doily',
				'identifier' => '1970.006.001',
				'description' => 'This square, white, table centerpiece has a border of elaborate white Hardanger embroidery with cutwork.',
				'date' => 'Unknown',
				'creator' => 'Unknown',
				'source' => 'Gift of Mrs. Thomas L. Harris',
				'dimensions' => 'Length, 17.5 inches; width 17 inches',
				'status' => 1
			),
			array(
				'id' => 5,
				'name' => 'Folk Costume',
				'identifier' => '1971.013.001',
				'description' => 'The Telemark-style bunard was worn in 1875 by Anne Jonsdatter Gutukjær for her second marriage to Halvar Hansen Torstveit in Bø, Telemark, Norway.',
				'date' => '1875',
				'creator' => 'Unknown',
				'source' => 'Gift of Ann H. Gunderson',
				'dimensions' => NULL,
				'status' => 1
			),
			array(
				'id' => 6,
				'name' => 'Cup and Saucer',
				'identifier' => '1972.003.017',
				'description' => 'This cup and saucer was made by the Porsgrund Porcelain Factory in Norway. This pattern, which features a Hardanger wedding procession, was particularly popular.',
				'date' => 'Unknown',
				'creator' => 'Porgrund',
				'source' => 'Gift of Helga Lund Algyer',
				'dimensions' => 'Height, 2 inches; width, 5.375 inches; depth, 5.375 inches',
				'status' => 1
			),
			array(
				'id' => 7,
				'name' => 'Breast Plate',
				'identifier' => '1976.083.013',
				'description' => 'This breast plate, or plastron, uses beads to create a smøyg pattern.',
				'date' => 'Unknown',
				'creator' => 'Unknown',
				'source' => 'Gift of Eileen Borchers',
				'dimensions' => 'Width, 11.5 inches, length, 10 inches',
				'status' => 1
			),
			array(
				'id' => 8,
				'name' => 'Money Chest',
				'identifier' => '1977.058.013',
				'description' => 'This money chest possibly dates to 1614 and is painted in Vest-Agder-style rosemaling. The right side panel lifts up to reveal a space for a now missing secret drawer.',
				'date' => '1614',
				'creator' => 'Unknown',
				'source' => 'Gift of Ruth Herber',
				'dimensions' => 'Height, 13.188 inches; width, 20 inches; depth, 13.125 inches',
				'status' => 1
			),
			array(
				'id' => 9,
				'name' => 'Brooch',
				'identifier' => '1977.058.027',
				'description' => 'This brooch, or rosesølje, is made of curving filagree wires with open areas between.',
				'date' => 'Unknown',
				'creator' => 'Unknown',
				'source' => 'Gift of Ruth Herber',
				'dimensions' => 'Diameter, 2 inches',
				'status' => 1
			),
			array(
				'id' => 10,
				'name' => 'Coverlet',
				'identifier' => '1980.080.002',
				'description' => 'This coverlet is woven in a pattern of crosses, diamonds, and eight-petal flowers in rutevev (square weave) with double interlock joins. There is a row of crosses and kjerringtenner (old woman\'s teeth) on the top and bottom borders.',
				'date' => '1800-1830',
				'creator' => 'Unknown ',
				'source' => 'Gift of Clara Asbjornson',
				'dimensions' => 'Length, 51 inches; width, 65 inches',
				'status' => 1
			),
			array(
				'id' => 11,
				'name' => 'Coverlet',
				'identifier' => '1980.097.001',
				'description' => 'This coverlet consists of  two joined sections. It was woven using the skillbragd technique.',
				'date' => '1800-1870',
				'creator' => 'Unknown',
				'source' => 'Gift of Valborg Ravn',
				'dimensions' => ' Length, 72 inches; width, 57 inches',
				'status' => 1
			),
			array(
				'id' => 12,
				'name' => 'Painting, Tea Table',
				'identifier' => '1981.134.001',
				'description' => 'This impressionistic painting depicts a woman at a table with tea and fruit. Arild Weborg was born in 1900 in Trondheim, Norway. His family emigrated to the United States when he was seven years old. Weborg received most of his art training at the Chicago Institute of Art. He began exhibiting his art when he was in his 20s at the Norske Klub in Chicago and at the Art Institute. Weborg was hired as a commercial artist by Gray, Garfield, and LaDriere in Detroit. He became known for his drawings for advertisements of Oldsmobile and Dodge cars.',
				'date' => '1921',
				'creator' => 'Arild Weborg ',
				'source' => 'Gift of Artist',
				'dimensions' => 'Height, 38 inches; width, 38 inches.',
				'status' => 1
			),
			array(
				'id' => 13,
				'name' => 'Painting, Comparing',
				'identifier' => '1982.040.001',
				'description' => 'Bernhard Berntsen was born in Oslo in 1900. He worked as a galley boy on the S.S. Bergensfjord, signing off in New York City in 1919. He moved to Chicago and became involved with many of the city’s Norwegian-American organizations. Through these clubs, he dabbled in the arts. His profession was building scaffolding around skyscrapers to facilitate construction or repairs. In 1928 he moved to Brooklyn to join the Chrysler Building scaffolding crew.',
				'date' => '1973',
				'creator' => 'Bernhard Berntsen',
				'source' => 'Museum Purchase',
				'dimensions' => 'Width, 14 inches; height, 18 inches',
				'status' => 1
			),
			array(
				'id' => 14,
				'name' => 'Letter Box',
				'identifier' => '1984.035.001',
				'description' => 'This box was made using pegged construction.  It has hand-wrought iron hinges and a spiralled grasp on the cover.  The front, sides and cover are fully decorated with variety of early chip carved designs.  The cover has line carved motif with elements of cross and Celtic knot.  unpainted. These designs were symbols that provided protection from harm, brought goodness and light, offered the blessing of fertility, and access to the divine world.',
				'date' => '1867',
				'creator' => 'Johannes Johanessen Oksdal',
				'source' => 'Gift of Gertrude Berg',
				'dimensions' => 'Height, 6 inches; width, 9 inches; depth, 6.5 inches',
				'status' => 1
			),
			array(
				'id' => 15,
				'name' => 'Painting, Self Portrait',
				'identifier' => '1984.056.008',
				'description' => 'This painting, titled "Self Portrait," was painted by Bernhard Berntsen. Berntsen was born in Oslo in 1900. He worked as a galley boy on the S.S. Bergensfjord, signing off in New York City in 1919. He moved to Chicago and became involved with many of the city’s Norwegian-American organizations. Through these clubs, he dabbled in the arts. His profession was building scaffolding around skyscrapers to facilitate construction or repairs. In 1928 he moved to Brooklyn to join the Chrysler Building scaffolding crew. The artist\'s note that accompanies this painting states, "The idea for this self portrait came slowly.  I wanted to put so much into it.  It had to be with overalls and helmet on.  My helmet was decorated with the notes that Alma (the artist\'s wife) dedicated to me, a song entitled \'That Man of Mine.\'  I had a lot of fun with that on the job.  One day I was sitting at the lunch counter and suddenly heard the man next to me whistling Alma\'s song.  He was reading the notes from my helmet.  That must be a first.  My intention was to paint Alm\'a portrait on the palette."',
				'date' => '1930-1950',
				'creator' => 'Bernhard Berntsen',
				'source' => 'Museum Purchase',
				'dimensions' => 'Width, 36 inches; height, 40 inches',
				'status' => 1
			),
			array(
				'id' => 16,
				'name' => 'Painting, Samson and Delilah',
				'identifier' => '1984.061.004',
				'description' => '"Peter O. Foss (1865-1932), wasa  Norwegian immigrant who worked as ahouse painter in Massachusetts.  Despite not having any formal training,  his paintings are typically  powerfully expressive works on religious, mythological, and genre subjects.  Although he is known to have had models for some of his works, many appear to be his own creation."',
				'date' => 'ca. 1900',
				'creator' => 'Peter O. Foss',
				'source' => 'Gift of William Currier',
				'dimensions' => 'Height, 66 inches; width 52 inches',
				'status' => 1
			),
			array(
				'id' => 17,
				'name' => 'Ale Bowl',
				'identifier' => '1985.097.002',
				'description' => 'This two handled ale bowl, carved from one piece of wood, features handles of arched horses\' heads over ram\'s heads.',
				'date' => '1770-1880',
				'creator' => 'Unknown',
				'source' => 'Gift of J. Harry and Josefa Andersen',
				'dimensions' => 'Height, 8 inches; width, 13.625 inches; depth, 8.313 inches',
				'status' => 1
			),
			array(
				'id' => 18,
				'name' => 'Gloves',
				'identifier' => '1985.101.029',
				'description' => 'These dark grey knitted gloves have embroidered flowers in the Numedal-style on the backs. The cuffs are double knitted, with flossa-like pile on the outer edge.',
				'date' => '1900-1930',
				'creator' => 'Unknown',
				'source' => 'Gift of Wilfred and Ruth Harris',
				'dimensions' => 'Length, 10 inches; width, 5.5 inches',
				'status' => 1
			),
			array(
				'id' => 19,
				'name' => 'Coverlet',
				'identifier' => '1986.077.001',
				'description' => 'This coverlet was woven in two narrow section using the Voss-style of the skillbragd technique.The pattern consists of eight-pointed stars and diamonds.',
				'date' => '1830-1900',
				'creator' => 'Unknown',
				'source' => 'Museum Purchase',
				'dimensions' => 'Length, 71 inches; width, 45 inches.',
				'status' => 1
			),
			array(
				'id' => 20,
				'name' => 'Ale Bowl',
				'identifier' => '1986.093.006',
				'description' => 'This ale bowl was turned and carved from one piece of wood. The interior has Hallingdal-style rosemaling.',
				'date' => '1850-1870',
				'creator' => 'Knut Torset',
				'source' => 'Gift of Floyd Fairweather',
				'dimensions' => 'Height, 3.125 inches; width, 9.125 inches; depth, 9 inches',
				'status' => 1
			),
			array(
				'id' => 21,
				'name' => 'Skis',
				'identifier' => '1987.009.001',
				'description' => 'These skis, which appear to be handcrafted, were used by Roald used by Amundsen on his polar expeditions. The tops are decorated with a stylized version of interlaced dragons.',
				'date' => 'ca. 1920',
				'creator' => 'Unknown',
				'source' => 'Museum Purchase',
				'dimensions' => 'Length, 87.5 inches; width, 3.625 inches',
				'status' => 1
			),
			array(
				'id' => 22,
				'name' => 'Painting, Children at Play',
				'identifier' => '1987.009.003',
				'description' => 'This light filled impressionistic painting depicts three children in a yard near seacoast.  It is intersting that the painting is titled, "Children at Play" and the girls are doing laundry while the boy plays with a toy boat.',
				'date' => 'Unknown',
				'creator' => 'Even Ulving',
				'source' => 'Museum Purchase',
				'dimensions' => 'Height, 27 inches, width, 37 inches',
				'status' => 1
			),
			array(
				'id' => 23,
				'name' => 'Stave Constructed Box',
				'identifier' => '1987.039.001',
				'description' => 'This stave constructed box, or tine, dates to 1868. However, it was repainted by the donor in the late 1950s after it was damaged by a fire.',
				'date' => '1868',
				'creator' => 'Unknown',
				'source' => 'Gift of Eleanor Ericson',
				'dimensions' => 'Height, 6.75 inches; width, 10 inches, depth, 5.75 inches',
				'status' => 1
			),
			array(
				'id' => 24,
				'name' => 'Knife',
				'identifier' => '1987.160.001',
				'description' => 'The blade on this knife was hand-tooled against a wheel.  The wood is hand-carved in a Telemark style with acanthus leaves and bands of pearls. The knife belonged to Arnold Naess, whose family emigrated from Norway in the 19th century and setlled in Brooklyn, NY.  It was given to the father of the donor at the death of the owner, as a keepsake from their boyhood friendship.',
				'date' => '1800-1830',
				'creator' => 'Unknown',
				'source' => 'Gift of Fredrik Hedling',
				'dimensions' => 'Height, 1 inch; width, 9.5 inches; depth, 1 inch',
				'status' => 1
			),
			array(
				'id' => 25,
				'name' => 'Knife',
				'identifier' => '1989.067.002',
				'description' => 'This knife has a hand-forged steel blade set into a handle made of diseased birch wood.  There are acanthus engraved silver rings at both ends of handle. The sheath is made of black leather with a carved acanthus design.  Both ends of the sheath are encased in silver which is also engraved with a acanthus design.',
				'date' => '1950-1989',
				'creator' => 'Unknown',
				'source' => 'Gift of Municipalities in West Telemark   ',
				'dimensions' => 'Height, 1.25 inches; width, 10 inches; depth,1.125 inches.',
				'status' => 1
			),
			array(
				'id' => 26,
				'name' => 'Table Runner',
				'identifier' => '1991.010.001',
				'description' => 'This Hardanger embroidered table runner features eight-point stars and diamonds.',
				'date' => '1930-1970',
				'creator' => 'Sigrid Melloh',
				'source' => 'Museum Purchase',
				'dimensions' => 'Length, 29 inches; width, 14.75 inches',
				'status' => 1
			),
			array(
				'id' => 27,
				'name' => 'Crazy Quilt Robe',
				'identifier' => '1992.079.001',
				'description' => 'This woman\'s full length robe is comprised of crazy quilt blocks in many colors of velvets and satins. Bible verses and sayings, in Norwegian and English, are embroidered on many patches. The gown was made by the donor\'s Norwegian immigrant grandmother, Helena Monson Rossing, a milliner by trade. Since the Bible verses on the robe are the type assigned to, or chosen by, confirmands. the dressing gown may have been a gift from Helena to her daughter Viola (b. 1889) in encouragement and celebration of this important personal and religious event.',
				'date' => 'ca. 1900',
				'creator' => 'Helena Monson',
				'source' => 'Gift of Elizabeth Forell',
				'dimensions' => 'Length, 59 inches',
				'status' => 1
			),
			array(
				'id' => 28,
				'name' => 'Wallet',
				'identifier' => '1995.018.004',
				'description' => 'This wallet that belonged to A. T. Bakke was used to hold the families important papers when they immigrated from Norway to the United States. The wallet would be shown with the family\'s vaccination records and passports.',
				'date' => '1830',
				'creator' => 'Unknown',
				'source' => 'Gift of Marion and Lila Nelson',
				'dimensions' => 'Width, 5 inches; length, 7 inches',
				'status' => 1
			),
			array(
				'id' => 29,
				'name' => 'Sculpture, Hardanger Fiddler',
				'identifier' => '1995.031.001',
				'description' => 'The fiddler is wearing a traditional Norwegian man\'s costume.  The Hardnager fiddle has lion head and crown at the scroll end, but otherwise is detailed as a cat with tiger markings.',
				'date' => '1988',
				'creator' => 'James Jacobson',
				'source' => 'Gift of Gunhild Jacobson and family',
				'dimensions' => 'Height, 13.75 inches; width, 3.5 inches; depth, 5.75 inches',
				'status' => 1
			),
			array(
				'id' => 30,
				'name' => 'Print, Parody of Hardanger Wedding Scene',
				'identifier' => '1996.016.001',
				'description' => NULL,
				'date' => '1870-1900',
				'creator' => 'Theodor Kittleson',
				'source' => 'Gift of Darrell Henning',
				'dimensions' => 'Width, 28 inches; height, 8.5 inches',
				'status' => 1
			),
			array(
				'id' => 31,
				'name' => 'Painting, Vesterheim',
				'identifier' => '1997.001.001',
				'description' => 'Painting done at the time of the restoration of Vesterheim main museum building 1975.',
				'date' => '1975',
				'creator' => 'David Gray',
				'source' => 'Gift of James Kornmeyer',
				'dimensions' => 'Width, 9.5 inches; height, 7.5 inches',
				'status' => 1
			),
			array(
				'id' => 32,
				'name' => 'Ale Bowl',
				'identifier' => '1997.070.001',
				'description' => 'This hand-made ale bowl was given by the donor\'s family to an aunt when she visited Norway after World War II.',
				'date' => '1950',
				'creator' => 'Inga Lund',
				'source' => 'Gift of Jennie H. Halverson in memory of Martha and Rolf Casper.',
				'dimensions' => 'Height, 4.375 inches; width, 10 inches; depth, 4.813 inches',
				'status' => 1
			),
			array(
				'id' => 33,
				'name' => 'Trunk',
				'identifier' => '1997.082.001',
				'description' => 'The trunk was painted by Hans Glittenberg (1780-1873) who is recognized as one of the rosemaling masters.He developed a distinctive style that is characterized by delicate line work and a limited but pleasing palette.The trunk was brought from Røldal, Norway by Gunnar Överland. He emigrated from Norway in 1908 and settled in Iowa.',
				'date' => '1847',
				'creator' => 'Hans Glittenberg',
				'source' => 'Gift of Gladys Fjelland',
				'dimensions' => 'Height, 30 inches; width, 47.25 inches; depth, 26.5 inches',
				'status' => 1
			),
			array(
				'id' => 34,
				'name' => 'Knife Sheath',
				'identifier' => '1998.080.007',
				'description' => 'This knife sheath is made of bone and features geometric incised designs.',
				'date' => '1854',
				'creator' => 'Unknown',
				'source' => 'Gift of Marion and Lila Nelson',
				'dimensions' => 'Height, 1.5 inches; length, 7.25 inches; depth, 1.5 inches',
				'status' => 1
			),
			array(
				'id' => 35,
				'name' => 'Sculpture, Man with Horse and Plow',
				'identifier' => '2000.028.013',
				'description' => 'A  realistic depiction of horse with man walking behind single bottom plow.',
				'date' => '1966',
				'creator' => 'Bjarne Walle',
				'source' => 'Gift of Harry and Josefa Andersen',
				'dimensions' => 'Height, 11.25 inches; width, 25.5 inches; depth, 5.75 inches',
				'status' => 1

			),
			array(
				'id' => 36,
				'name' => 'Sami Needle Case',
				'identifier' => '2000.002.001',
				'description' => 'This Sami needlecase is made from a hollowed out bone. The soft leather case iin the center of the bone is pulled out by an the flat rondel which is also made of bone.',
				'date' => '1929',
				'creator' => 'Unknown',
				'source' => 'Museum Purchase',
				'dimensions' => 'height, 0.563 inches; width, 3.063 inches  depth, 0.875 inches',
				'status' => 1

			),
			array(
				'id' => 37,
				'name' => 'Folk Costume',
				'identifier' => '2003.042.001',
				'description' => 'This Aust-Agdar bunad was made in Norway and worn by the donor at many occasions.',
				'date' => '1967',
				'creator' => 'Husflid in southern Norway',
				'source' => 'Gift of Grace Rikansrud',
				'dimensions' => NULL,
				'status' => 1
			),
			array(
				'id' => 38,
				'name' => 'Violin',
				'identifier' => '2004.006.001',
				'description' => 'This violin made by Otinus Busness in 1983.  Busnees started making violins sometime after 1960 during his retirement in Florida.  This violin is made the violin of wood from a trunk (1859)  that his grandparents brought from Kinsarvik.  It is the 12th and last violin which he made.  It was painted by Gary Albrecht in 1983 on the occasion of Busness\'s 90th birthday.',
				'date' => '1983',
				'creator' => 'Otinus Busness/Gary Albrecht',
				'source' => 'Gift of Marjorie Runquist',
				'dimensions' => 'Height, 3 inches; width, 24.25 inches; depth, 8 inches',
				'status' => 1
			),
			array(
				'id' => 39,
				'name' => 'Painting,  Anchored at Concarneau',
				'identifier' => '2008.004.002',
				'description' => 'This was painted by Jonas Lie when he was in Brittany  in 1929.  Concarneau is a town on the coast of France which is known for its annual August celebration, Fête des Filets Bleus (Festival of the blue nets), which is named after the traditional blue nets of Concarneau\'s fishing fleet.',
				'date' => '1929',
				'creator' => 'Jonas Lie',
				'source' => 'Bequest of Nancy-Carroll Draper',
				'dimensions' => 'Width, 55.688 inches, height, 45.5 inches',
				'status' => 1
			),
			array(
				'id' => 40,
				'name' => 'Tapestry',
				'identifier' => '2010.012.001',
				'description' => 'This woven tapestry features skiers in various positions.',
				'date' => '1953',
				'creator' => 'Else Poulsson',
				'source' => 'Gift of Phyllis and Bill Lyders in memory of our good friend and Norwegian brother, Erik Bye.',
				'dimensions' => 'Width, 54 inches; height, 85.5 inches',
				'status' => 1
			),
			array(
				'id' => 41,
				'name' => 'Mittens',
				'identifier' => '2012.030.001',
				'description' => 'This extra large pair of mittens was hand-knit with white wool yarn.  These mittens would have been felted to make them smaller and create a tight, dense weave. Each mitten has two thumbs, on opposites sides. This type of mitten was traditionally worn by fishermen.  The advantage having having two thumbs was that the mitten could be turned over when one side wore out.',
				'date' => '2012',
				'creator' => 'Sommarøy Husflidslag',
				'source' => 'Gift of Svein Ludvigsen',
				'dimensions' => 'Width, 7.5 inches; length,18.5 inches',
				'status' => 1
			),
			array(
				'id' => 42,
				'name' => 'Trunk',
				'identifier' => '2012.041.001',
				'description' => 'This trunk was painted in the Hallingdal style by Embrik Bæra.  Bæra was known for his naive portrayals of Biblical and other figures.  The central female figure is Lady Fortuna from Roman mythology. Originally, Fortuna was a major deity, holidng charge of the fates of all humans.  Later in history, she became more of a fertility figure.  She is flanked by a bride and groom. The trunk was brought from Sogndal, Norway, in 1871 by Kari Ylvisaker Ness when she emigrated to Red Wing, MN, with her three young children.',
				'date' => '1830',
				'creator' => 'Embrik Bæra',
				'source' => 'Gift of Joan Losen in memory of Kari Ylvisaker Ness and Nora Hjermstad Fjeldstad',
				'dimensions' => 'Height, 25 inches; width, 40 inches; depth, 21.5 inches',
				'status' => 1
			),
			array(
				'id' => 43,
				'name' => 'Trunk',
				'identifier' => 'LC0120',
				'description' => 'This trunk features finely painted Rococo panels that are broken up by embossed and perforated acanthus metal bands.',
				'date' => '1825',
				'creator' => 'Gudbrand Larssen Foss',
				'source' => 'Gift of Edward Dahl',
				'dimensions' => 'Height, 25.5 inches; width, 42.5 inches; depth, 25 inches',
				'status' => 1
			),
			array(
				'id' => 44,
				'name' => 'Basket',
				'identifier' => 'LC1213',
				'description' => 'This birch root basket has an outflaring body made up of zigzag borders between concentric circles.',
				'date' => '1800',
				'creator' => 'Uknown',
				'source' => 'Gift of Norwegian Museums',
				'dimensions' => 'Height, 13 inches; width, 12.5 inches; depth, 12.5 inches',
				'status' => 1
			),
			array(
				'id' => 45,
				'name' => 'Butter Mold',
				'identifier' => 'LC1284',
				'description' => 'This would have been used for molding butter. The initials on the front indicate that it was owned by a woman. The "E" was the first letter in woman\'s first name; the "O" was the first letter of her father\'s name; the "D" indicated that she was a "datter," or daughter. Had it belonged to a man, the last letter would be "S" for son.',
				'date' => '1839',
				'creator' => 'Unknown',
				'source' => 'Gift of Norwegian Museums',
				'dimensions' => 'Height, 7.25 inches; width, 7.75 inches; depth, 7.375 inches',
				'status' => 1
			),
			array(
				'id' => 46,
				'name' => 'Mittens',
				'identifier' => 'LC1665',
				'description' => 'These mittens feature eight petal flowers on the  backs and criss-cross with diamond patterns on the palms.',
				'date' => '1928',
				'creator' => 'Sofia Rønsberg',
				'source' => 'Museum Purchase',
				'dimensions' => 'Width, 4 inches; length, 11 inches',
				'status' => 1
			),
			array(
				'id' => 47,
				'name' => 'Mangle Board',
				'identifier' => 'LC1745',
				'description' => 'This mangle board features a board with acanthus carving and a highly stylized kneeling lion for a handle.',
				'date' => '1808',
				'creator' => 'Unknown',
				'source' => 'Gift of G. V.Vetlesen',
				'dimensions' => 'Height, 6.5 inches; width, 29.25 inches; depth, 4.375 inches',
				'status' => 1
			),
			array(
				'id' => 48,
				'name' => 'Folk Costume',
				'identifier' => 'LC4293',
				'description' => 'This East Telemark bunad has a floor-length heavily gathered skirt that joins to a brocaded silk bodice above the bust.  The skirt is edged with a velvet band and silk ribbon.  The woven band is done in a pickup pattern in reds and there are pompoms at the ends. The wide belt is tablet-woven. There is a long black sateen apron that is bordered with two bands of richly brocaded silk ribbon and chenille. The long-sleeved black wool jacket, is waist length in the front and rises sharply in the back.  It has a standing collar and is bordered with silk ribbon and lined with red cotton.',
				'date' => 'Nineteenth Century',
				'creator' => 'Unknown',
				'source' => 'Gift of Tone Øverland Smedal',
				'dimensions' => NULL,
				'status' => 1
			),
			array(
				'id' => 49,
				'name' => 'Bridal Crown',
				'identifier' => 'LC5632',
				'description' => 'This bridal crown has a three inch wide circle of cutout geometric and floral designs around the base. Above that are six cutout rondels, each capped with a finial and cross. Between the rondels are extensions with bird-like figures holding spoons. Teardrop shaped metal pieces, embossed or set with glass or enamel, hang from the side and top sections of the crown. In the back, embroidered silk ribbons hang from the bottom section.',
				'date' => 'ca. 1740',
				'creator' => 'Unknown',
				'source' => 'Gift of Martha Skaar, Ragnhild Skaar, and Gunvor Gooding',
				'dimensions' => 'Height, 6.5 inches; diameter, 6.5 inches',
				'status' => 1
			),
			array(
				'id' => 50,
				'name' => 'Native American Outfit',
				'identifier' => 'LC7465',
				'description' => 'Chris Aalgaard, the owner of this outfit, was a Norwegian who immigrated to the Westby Wisconsin area. He was a self-styled frontiersman and a friend to Native Americans.',
				'date' => '1870-1900',
				'creator' => 'Unknown',
				'source' => 'Gift of Chris Aalgaard',
				'dimensions' => NULL,
				'status' => 1
			)
		);

		// Uncomment the below to run the seeder
		$this->model->insert($data);
	}

}