<?php

echo <<<PHP
/**
 * Finds the first object in the query with the given filter
 *
 * Example usage:
 * <code>
 * \$query->findBy$columnPhpName('fooValue'); //
     WHERE $columnName = 'fooValue'
 * \$query->findBy$columnPhpName('%fooValue%'); //
     WHERE $columnName LIKE '%fooValue%'
 * </code>
 *
 * @param string \$$columnName The value to use as filter.
 *          Accepts wildcards (* and % trigger a LIKE)
 * @param string|null \$comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
 * @param string|null \$$localeVariableName Overwrites the locale for this filter
 *
 * @return $objectClassName|null The result
 * @throws PropelException
 */
public function findOneBy$columnPhpName(string \$$columnName , ?string \$comparison = null, ?string \$$localeVariableName = null): ?$objectClassName
{
    return \$this->filterBy$columnPhpName(\$$columnName , \$comparison, \$$localeVariableName)
        ->findOne();
}


PHP;
