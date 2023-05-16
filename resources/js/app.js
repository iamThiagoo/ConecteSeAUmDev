import './bootstrap';

import Alpine from 'alpinejs';
window.Alpine = Alpine;

import Aos from 'aos';
window.Aos = Aos;

Aos.init();
Alpine.start();