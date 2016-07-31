<?php

/*
 * Min PHP Version: 4
 */

class db
{
	//Init
	private $host;
	private $dbname;
	private $usr;
	private $pass;
	private $dbh;
	private $prefix;
	public $data;

	//Datenbankverbindung aufbauen
	function __construct($host, $dbname, $usr, $pass, $prefix = '')
	{
		$this->host = $host;
		$this->dbname = $dbname;
		$this->usr = $usr;
		$this->pass = $pass;
		$this->prefix = $prefix;


	}

	private $col = null;

	public function setCol($col)
	{
		$this->col = $col;
	}

	//Daten holen
	public function get($where = [], $link = 'AND')
	{
		if (isset($this->col))
		{
			//Entweder übergebene Daten oder in $this->data vorhandene nutzen
			if (empty($where))
			{
				if (empty($this->data))
				{
					$where = [];
				} else
				{
					$where = $this->data;
				}
			}

			//
		}
	}

	//Daten einfügen
	public function insert($args = [])
	{
		if (isset($this->col))
		{
			//Entweder übergebene Daten oder in $this->data vorhandene nutzen
			if (empty($args))
			{
				if (empty($this->data))
				{
					$args = [];
				} else
				{
					$args = $this->data;
				}
			}

			if (!empty($args))
			{

			}
		}
	}

	public function lastID()
	{
		return $this->dbh->lastInsertId();
	}

	//Daten Updaten
	public function update($where = [], $dataToUpdate = [], $link = 'AND')
	{
		if (isset($this->col))
		{
			//Entweder übergebene Daten oder in $this->data vorhandene nutzen
			if (empty($dataToUpdate))
			{
				if (empty($this->data))
				{
					$dataToUpdate = [];
				} else
				{
					$dataToUpdate = $this->data;
				}
			}


		}
	}

	//Daten Löschen
	public function delete($where = [], $link = 'AND')
	{
		if (isset($this->col))
		{
			//Entweder übergebene Daten oder in $this->data vorhandene nutzen
			if (empty($where))
			{
				if (empty($this->data))
				{
					$where = [];
				}
				else
				{
					$where = $this->data;
				}
			}


		}
	}

	//Create Table
	public function createCol($name, $rows)
	{
		$dataTypes = ['int' => 'bigint(11) NOT NULL', 'string' => 'text CHARACTER SET utf8 NOT NULL', 'longstring' => 'longtext CHARACTER SET utf8 NOT NULL', 'boolean' => 'tinyint(1) NOT NULL'];

	}

	//Version
	public function version()
	{

	}

	//Aufräumen
	public function clear()
	{
		$this->col = null;
		$this->data = '';
	}

}