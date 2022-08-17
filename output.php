<?php
/*
 * output.php - output modul
 *
 * Copyright (C) 2001 Achim Winkler <achim@lkcc.org>
 *
 * This is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2, or (at your option)
 * any later version.
 *
 * This software is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this package; see the file COPYING.  If not, write to
 * the Free Software Foundation, Inc., 59 Temple Place - Suite 330,
 * Boston, MA 02111-1307, USA.
 */
class COutput
{
	var $datacount;
	var $page;
	var $entrypos;
	var $phrase;
	var $indexsize;
	var $entriesperpage;
	var $pageindex;
	var $messengers;
	var $shortmessengerformat;
	var $messages;
	var $adminpass;
	var $logip;
	var $datapath;
	var $language;

	function COutput($page, $entrypos, $phrase)
    {
		global $lang;

		$this->page = (int) $page;
		$this->entrypos = (int) $entrypos;
		$this->phrase = $phrase;

		require("config.php");
		$this->indexsize = $indexsize;
		$this->entriesperpage = $entriesperpage;
		$this->pageindex = $pageindex;
		$this->messengers = $messengers;
		$this->shortmessengerformat = $shortmessengerformat;
		$this->adminpass = $adminpass;
		$this->moderatorpass = $moderatorpass;
		$this->logip = $logip;
		$this->datapath = $datapath;

		if(!is_file($this->datapath . "/data.dat"))
        {
			$dummy = fopen($this->datapath . "/data.dat", "w") or die("Can't create data.dat!");
			fclose($dummy);
		}
		if(!is_file($this->datapath . "/index.dat"))
        {
			$dummy = fopen($this->datapath . "/index.dat", "w") or die("Can't create index.dat!");
			fclose($dummy);
		}

		$this->datacount = filesize($this->datapath . "/index.dat") / $this->indexsize;

		if($this->page > intval((($this->datacount - 1) / $this->entriesperpage) + 1))
            $this->page = intval((($this->datacount - 1) / $this->entriesperpage) + 1);

		require("language.php");
		if(isset($lang))
            $language = $lang;
		$this->language = $language;
		switch($language)
        {
			case "eng":
			$this->messages = $english;
			break;

			case "ger":
			$this->messages = $german;
			break;

			case "swe":
			$this->messages = $swedish;
			break;

			case "fre":
			$this->messages = $french;
			break;

			case "ita":
			$this->messages = $italian;
			break;

			case "por":
			$this->messages = $portuguese;
			break;

			case "dut":
			$this->messages = $dutch;
			break;

			case "spa":
			$this->messages = $spanish;
			break;

			case "rus":
			$this->messages = $russian;
			break;

			case "cze":
			$this->messages = $czech;
			break;

			case "fin":
			$this->messages = $finnish;
			break;

			case "chi":
			$this->messages = $chinese;
			break;

			case "dan":
			$this->messages = $danish;
			break;

			case "pol":
			$this->messages = $polish;
			break;

			case "ice":
			$this->messages = $icelandic;
			break;

			case "svk":
			$this->messages = $slovak;
			break;

			case "hug":
			$this->messages = $hungarian;
			break;

			default:
			$this->messages = $english;
			break;
		}
	}

	function Output_Head()
    {
		header("Expires: Mon, 01 Jan 1990 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-cache, must-revalidate");
        header("Pragma: no-cache");

		require("head.html.inc");
	}


	function Output_Foot()
    {
		require("foot.html.inc");
	}


	function Output_Data()
    {
		$position = $this->datacount - ($this->page * $this->entriesperpage);
		if($position < 0)
            $position = 0;

		if($this->datacount != 0)
        {
			#get the data position from the index file
			$i = 0;
			while(file_exists($this->datapath . "/index.lck"))
            {
				if((filemtime($this->datapath . "/index.lck") + 300) < time())
                    unlink($this->datapath . "/index.lck");
				usleep(500000);
				$i++;
				if($i > 9)
                    die("Index.dat is locked! Please try it later again!");
			}
			$lock = fopen($this->datapath . "/index.lck", "w") or die("Can't create index.lck!");
			fclose($lock);

			$input = fopen($this->datapath . "/index.dat", "r") or die("Can't open index.dat for reading!");
			fseek($input, ($position * $this->indexsize), SEEK_SET);
			for($i = 0; $i < $this->entriesperpage; $i++)
            {
				$datapos[] = (int) fgets($input, $this->indexsize + 1);
			}

			fclose($input);
			unlink($this->datapath . "/index.lck");

			#get the data
			$i = 0;
			while(file_exists($this->datapath . "/data.lck"))
            {
				if((filemtime($this->datapath . "/data.lck") + 300) < time())
                    unlink($this->datapath . "/data.lck");
				usleep(500000);
				$i++;
				if($i > 9)
                    die("Data.dat is locked! Please try it later again!");
			}
			$lock = fopen($this->datapath."/data.lck", "w") or die("Can't create data.lck!");
			fclose($lock);

			$input = fopen($this->datapath."/data.dat", "r") or die("Can't open data.dat for reading!");

			$n = $this->datacount - (($this->page - 1) * $this->entriesperpage);
			if($n > $this->entriesperpage)
                $n = $this->entriesperpage;
			for($i = 0; $i < $n; $i++)
            {
				fseek($input, $datapos[$i], SEEK_SET);
				$name[] = rtrim(stripslashes(substr(fgets($input, 1024), 5)));
				$mail[] = rtrim(stripslashes(substr(fgets($input, 1024), 5)));
				$icq[] = rtrim(stripslashes(substr(fgets($input, 1024), 4)));
				$aim[] = rtrim(stripslashes(substr(fgets($input, 1024), 4)));
				$yim[] = rtrim(stripslashes(substr(fgets($input, 1024), 4)));
				$msn[] = rtrim(stripslashes(substr(fgets($input, 1024), 4)));
				$loc[] = rtrim(stripslashes(substr(fgets($input, 1024), 4)));
				$url[] = rtrim(stripslashes(substr(fgets($input, 1024), 4)));
				$text[] = rtrim(stripslashes(substr(fgets($input, 16384), 5)));
				$date[] = rtrim(substr(fgets($input, 1024), 5));
				$ip[] = rtrim(substr(fgets($input, 1024), 3));
			}

			fclose($input);
			unlink($this->datapath . "/data.lck");

			#make the data visible
			$fligflag = "tablerow1";
			for($i = count($name) - 1; $i >= 0; $i--)
            {
				if($fligflag == "tablerow1")
                    $fligflag = "tablerow2";
				else
                    $fligflag = "tablerow1";

				$entrynum = $this->datacount - (count($name) - $i - 1) - (($this->page - 1) * $this->entriesperpage);

				require("body.html.inc");
			}
		}
	}

	function Output_All()
    {
		$this->Output_Head();
		$this->Output_Data();
		$this->Output_Foot();
	}
}
?>