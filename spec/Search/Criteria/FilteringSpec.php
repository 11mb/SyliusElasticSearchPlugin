<?php

namespace spec\Sylius\ElasticSearchPlugin\Search\Criteria;

use Sylius\ElasticSearchPlugin\Search\Criteria\Filtering;
use PhpSpec\ObjectBehavior;

/**
 * @author Arkadiusz Krakowiak <arkadiusz.krakowiak@lakion.com>
 */
final class FilteringSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Filtering::class);
    }

    function it_can_be_created_from_query_parameters()
    {
        $this->beConstructedThrough('fromQueryParameters', [[
            'option' => 'red',
            'size' => 's',
        ]]);

        $this->getFields()->shouldReturn(['option' => 'red', 'size' => 's',]);
    }

    function it_removes_page_per_page_and_sort_attributes_from_query_parameters()
    {
        $this->beConstructedThrough('fromQueryParameters', [[
            'option' => 'blue',
            'size' => 'm',
            'sort' => 'name',
            'page' => 10,
            'limit' => 50,
        ]]);

        $this->getFields()->shouldReturn(['option' => 'blue', 'size' => 'm',]);
    }
}
