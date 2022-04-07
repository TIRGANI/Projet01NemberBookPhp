<?php

/**
 * Description of IDao
 *
 * @author Elharhari Milouda
 */
interface IDao {

    function create($o);

    function delete($o);

    function update($o);

    function findAll();

    function findById($id);
}
