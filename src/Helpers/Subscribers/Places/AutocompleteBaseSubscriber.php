<?php

/*
 * This file is part of the Ivory Google Map package.
 *
 * (c) Eric GELOEN <geloen.eric@gmail.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Ivory\GoogleMap\Helpers\Subscribers\Places;

use Ivory\GoogleMap\Helpers\PlacesAutocompleteEvent;
use Ivory\GoogleMap\Helpers\PlacesAutocompleteEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Autocomplete base subscriber.
 *
 * @author GeLo <geloen.eric@gmail.com>
 */
class AutocompleteBaseSubscriber implements EventSubscriberInterface
{
    /**
     * Renders the autocomplete javascript base.
     *
     * @param \Ivory\GoogleMap\Helpers\PlacesAutocompleteEvent $placesAutocompleteEvent The places autocomplete event.
     */
    public function onAutocomplete(PlacesAutocompleteEvent $placesAutocompleteEvent)
    {
        $placesAutocompleteEvent->getDispatcher()->dispatch(
            PlacesAutocompleteEvents::JAVASCRIPT_BASE_COORDINATE,
            $placesAutocompleteEvent
        );

        $placesAutocompleteEvent->getDispatcher()->dispatch(
            PlacesAutocompleteEvents::JAVASCRIPT_BASE_BOUND,
            $placesAutocompleteEvent
        );
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return array(PlacesAutocompleteEvents::JAVASCRIPT_BASE => 'onAutocomplete');
    }
}