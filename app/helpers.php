<?php

function sort_by_attr_link($link, $attr) {
	$direction = request('direction') === 'asc' ? 'desc' : 'asc';

	return route($link, ['page' => request('page'), 'sortBy' => $attr, 'direction' => $direction]);
}