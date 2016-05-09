<?php

namespace spec\Security\Smarty;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SmartyWrapperSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Security\Smarty\SmartyWrapper');
    }
}
