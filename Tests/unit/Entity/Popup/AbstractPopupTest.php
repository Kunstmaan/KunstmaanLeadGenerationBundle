<?php

namespace Kunstmaan\LeadGenerationBundle\Tests\Entity\Popup;

use Doctrine\Common\Collections\ArrayCollection;
use Kunstmaan\LeadGenerationBundle\Entity\Rule\LocaleWhitelistRule;
use Kunstmaan\LeadGenerationBundle\Entity\Rule\UrlBlacklistRule;
use Kunstmaan\LeadGenerationBundle\Tests\unit\Entity\Popup\Popup;
use PHPUnit\Framework\TestCase;

class AbstractPopupTest extends TestCase
{
    public function testGettersAndSetters()
    {
        $popup = new Popup();
        $rule = new LocaleWhitelistRule();
        $rule2 = new UrlBlacklistRule();
        $popup->setName('delboy1978uk');
        $popup->setId(256);
        $popup->setHtmlId(652);
        $popup->setRules(new ArrayCollection([$rule]));
        $popup->addRule($rule2);

        $this->assertInstanceOf(ArrayCollection::class, $popup->getRules());
        $this->assertEquals(2, $popup->getRuleCount());
        $popup->removeRule($rule2);
        $this->assertEquals(1, $popup->getRuleCount());
        $this->assertEquals('delboy1978uk', $popup->getName());
        $this->assertEquals(256, $popup->getId());
        $this->assertEquals(652, $popup->getHtmlId());
        $this->assertEquals(Popup::class, $popup->getFullClassname());
        $this->assertEquals('Popup', $popup->getClassname());
        $this->assertNull($popup->getAvailableRules());
    }
}
