<?php


/**
 * This class adds structure of 'user_profile' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Sun May 31 11:53:55 2009
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class UserProfileMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.UserProfileMapBuilder';

	/**
	 * The database map.
	 */
	private $dbMap;

	/**
	 * Tells us if this DatabaseMapBuilder is built so that we
	 * don't have to re-build it every time.
	 *
	 * @return     boolean true if this DatabaseMapBuilder is built, false otherwise.
	 */
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	/**
	 * Gets the databasemap this map builder built.
	 *
	 * @return     the databasemap
	 */
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	/**
	 * The doBuild() method builds the DatabaseMap
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap(UserProfilePeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(UserProfilePeer::TABLE_NAME);
		$tMap->setPhpName('UserProfile');
		$tMap->setClassname('UserProfile');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('USER_ID', 'UserId', 'INTEGER' , 'users', 'USER_ID', true, 10);

		$tMap->addColumn('BIRTHDATE', 'Birthdate', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('COUNTRY', 'Country', 'INTEGER', 'cp_countries', 'ID', false, 11);

		$tMap->addForeignKey('STATE', 'State', 'INTEGER', 'cp_states', 'ID', false, 11);

		$tMap->addForeignKey('CITY', 'City', 'INTEGER', 'cp_cities', 'ID', false, 11);

		$tMap->addColumn('ZIP', 'Zip', 'INTEGER', false, 11);

		$tMap->addColumn('MILES', 'Miles', 'TINYINT', true, 1);

		$tMap->addColumn('WEIGHT', 'Weight', 'INTEGER', false, 11);

		$tMap->addColumn('HEIGHT', 'Height', 'INTEGER', false, 11);

	} // doBuild()

} // UserProfileMapBuilder
