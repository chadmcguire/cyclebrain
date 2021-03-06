<?php


/**
 * This class adds structure of 'user_bikes' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * 06/28/09 19:43:55
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class UserBikesMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.UserBikesMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(UserBikesPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(UserBikesPeer::TABLE_NAME);
		$tMap->setPhpName('UserBikes');
		$tMap->setClassname('UserBikes');

		$tMap->setUseIdGenerator(true);

		$tMap->addForeignKey('USER_ID', 'UserId', 'INTEGER', 'users', 'USER_ID', true, 10);

		$tMap->addPrimaryKey('USER_BIKE_ID', 'UserBikeId', 'INTEGER', true, 10);

		$tMap->addColumn('BIKE_YEAR', 'BikeYear', 'INTEGER', false, 10);

		$tMap->addColumn('BIKE_MAKE', 'BikeMake', 'VARCHAR', false, 45);

		$tMap->addColumn('BIKE_MODEL', 'BikeModel', 'VARCHAR', false, 45);

		$tMap->addColumn('EQUIP_FUNCTION', 'EquipFunction', 'INTEGER', true, 10);

		$tMap->addColumn('DESCRIPTION', 'Description', 'VARCHAR', true, 40);

	} // doBuild()

} // UserBikesMapBuilder
