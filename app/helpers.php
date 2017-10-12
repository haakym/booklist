<?php

function sort_by_attr_link($link, $attr) {
	$direction = request('direction') === 'asc' ? 'desc' : 'asc';

	$params = collect(request()->only('page', 'title', 'author'))->filter();

	return route($link, $params->merge(['sortBy' => $attr, 'direction' => $direction])->all());
}