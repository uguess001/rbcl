/* To avoid CSS expressions while still supporting IE 7 and IE 6, use this script */
/* The script tag referencing this file must be placed before the ending body tag. */

/* Use conditional comments in order to target IE 7 and older:
	<!--[if lt IE 8]><!-->
	<script src="ie7/ie7.js"></script>
	<!--<![endif]-->
*/

(function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'icomoon\'">' + entity + '</span>' + html;
	}
	var icons = {
		'icon-care': '&#xe900;',
		'icon-aeroplane': '&#xea4e;',
		'icon-tap': '&#xea4f;',
		'icon-yatch': '&#xea50;',
		'icon-fire': '&#xea51;',
		'icon-car': '&#xea52;',
		'icon-technical-support-1': '&#xe9ab;',
		'icon-trophy': '&#xe9ac;',
		'icon-guide': '&#xe9ad;',
		'icon-target': '&#xe9ae;',
		'icon-puzzle': '&#xe9af;',
		'icon-server-error': '&#xe9b0;',
		'icon-pie-chart': '&#xe9b1;',
		'icon-server': '&#xe9b2;',
		'icon-pie-chart-presentation': '&#xe9b3;',
		'icon-settings-3': '&#xe9b4;',
		'icon-money-exchange': '&#xe9b5;',
		'icon-cog': '&#xe9b6;',
		'icon-headphones': '&#xe9b7;',
		'icon-meeting': '&#xe9b8;',
		'icon-calendar': '&#xe9b9;',
		'icon-charts': '&#xe9ba;',
		'icon-api': '&#xe9bb;',
		'icon-coins-2': '&#xe9bc;',
		'icon-brain': '&#xe9bd;',
		'icon-technical-support': '&#xe9be;',
		'icon-browser-view': '&#xe9bf;',
		'icon-flow-chart': '&#xe9c0;',
		'icon-email': '&#xe9c1;',
		'icon-goal': '&#xe9c2;',
		'icon-earth': '&#xe9c3;',
		'icon-help': '&#xe9c4;',
		'icon-browser-cmd': '&#xe9c5;',
		'icon-document': '&#xe9c6;',
		'icon-deadline': '&#xe9c7;',
		'icon-network': '&#xe9c8;',
		'icon-coffee': '&#xe9c9;',
		'icon-toolbox': '&#xe9ca;',
		'icon-browsers': '&#xe9cb;',
		'icon-presentation': '&#xe9cc;',
		'icon-cloud-computing': '&#xe9cd;',
		'icon-office-chair': '&#xe9ce;',
		'icon-browser-5': '&#xe9cf;',
		'icon-coinstwo': '&#xe9d0;',
		'icon-browser-error': '&#xe9d1;',
		'icon-coins': '&#xe9d2;',
		'icon-browser-solved': '&#xe9d3;',
		'icon-calendar22': '&#xe9d4;',
		'icon-browser-2': '&#xe9d5;',
		'icon-planning-strategy': '&#xe9d6;',
		'icon-businesswoman': '&#xe9d7;',
		'icon-conversation': '&#xe9d8;',
		'icon-boss': '&#xe9d9;',
		'icon-laptop-cog': '&#xe9da;',
		'icon-businessman': '&#xe9db;',
		'icon-laptop-sequrity': '&#xe9dc;',
		'icon-brain-process': '&#xe9dd;',
		'icon-repair': '&#xe9de;',
		'icon-bars': '&#xe9df;',
		'icon-browser-chat': '&#xe9e0;',
		'icon-browser': '&#xe9e1;',
		'icon-money': '&#xe9e2;',
		'icon-bank-1': '&#xe9e3;',
		'icon-bug-2': '&#xe9e4;',
		'icon-briefcase': '&#xe9e5;',
		'icon-settings-code': '&#xe9e6;',
		'icon-bank': '&#xe9e7;',
		'icon-online-support-boy': '&#xe9e8;',
		'icon-folder': '&#xe9e9;',
		'icon-online-support': '&#xe9ea;',
		'icon-handshake': '&#xe9eb;',
		'icon-laptop-5': '&#xe9ec;',
		'icon-megaphone': '&#xe9ed;',
		'icon-rating-22': '&#xea53;',
		'icon-calculator-12': '&#xea54;',
		'icon-hardware2': '&#xea55;',
		'icon-calculator2': '&#xea56;',
		'icon-customer-support-1': '&#xe9ee;',
		'icon-laptop-4': '&#xe9ef;',
		'icon-bug-1': '&#xe9f0;',
		'icon-bug': '&#xe9f1;',
		'icon-24-hours': '&#xe9f2;',
		'icon-rating-1': '&#xe9f3;',
		'icon-rating': '&#xe9f4;',
		'icon-settings': '&#xe9f5;',
		'icon-chat-1': '&#xe9f6;',
		'icon-customer-support': '&#xe9f7;',
		'icon-laptop-3': '&#xe9f8;',
		'icon-laptop-22': '&#xea57;',
		'icon-laptop-12': '&#xea58;',
		'icon-laptop2': '&#xea59;',
		'icon-chat2': '&#xea5a;',
		'icon-badge': '&#xe9f9;',
		'icon-bill': '&#xe9fa;',
		'icon-bills': '&#xe9fb;',
		'icon-box': '&#xe9fc;',
		'icon-box-1': '&#xe9fd;',
		'icon-box-2': '&#xe9fe;',
		'icon-box-3': '&#xe9ff;',
		'icon-box-4': '&#xea00;',
		'icon-box-5': '&#xea01;',
		'icon-cash': '&#xea02;',
		'icon-coin': '&#xea03;',
		'icon-coins22': '&#xea04;',
		'icon-credit-card': '&#xea05;',
		'icon-delivery': '&#xea06;',
		'icon-dislike': '&#xea07;',
		'icon-dollar-symbol': '&#xea08;',
		'icon-dollar-symbol-1': '&#xea09;',
		'icon-dollar-symbol-2': '&#xea0a;',
		'icon-dollar-symbol-3': '&#xea0b;',
		'icon-dollar-symbol-4': '&#xea0c;',
		'icon-dollar-symbol-5': '&#xea0d;',
		'icon-headphones22': '&#xea0e;',
		'icon-id-card': '&#xea0f;',
		'icon-invoice': '&#xea10;',
		'icon-like': '&#xea11;',
		'icon-like-1': '&#xea12;',
		'icon-like-2': '&#xea13;',
		'icon-mathematics': '&#xea14;',
		'icon-money22': '&#xea15;',
		'icon-money-bag': '&#xea16;',
		'icon-monitor': '&#xea17;',
		'icon-monitor-1': '&#xea18;',
		'icon-newspaper': '&#xea19;',
		'icon-package': '&#xea1a;',
		'icon-package-1': '&#xea1b;',
		'icon-package-2': '&#xea1c;',
		'icon-package-3': '&#xea1d;',
		'icon-package-4': '&#xea1e;',
		'icon-package-5': '&#xea1f;',
		'icon-package-6': '&#xea20;',
		'icon-package-7': '&#xea21;',
		'icon-padlock': '&#xea22;',
		'icon-payment-method': '&#xea23;',
		'icon-pen': '&#xea24;',
		'icon-percentage': '&#xea25;',
		'icon-pie-chart22': '&#xea26;',
		'icon-piggy-bank': '&#xea27;',
		'icon-piggy-bank-1': '&#xea28;',
		'icon-piggy-bank-2': '&#xea29;',
		'icon-price-tag': '&#xea2a;',
		'icon-profits': '&#xea2b;',
		'icon-settings22': '&#xea2c;',
		'icon-shield': '&#xea2d;',
		'icon-shop': '&#xea2e;',
		'icon-shopping-bag': '&#xea2f;',
		'icon-shopping-bag-1': '&#xea30;',
		'icon-shopping-bag-2': '&#xea31;',
		'icon-shopping-bag-3': '&#xea32;',
		'icon-shopping-bag-4': '&#xea33;',
		'icon-shopping-bag-5': '&#xea34;',
		'icon-shopping-bag-6': '&#xea35;',
		'icon-shopping-bag-7': '&#xea36;',
		'icon-shopping-bag-8': '&#xea37;',
		'icon-shopping-bag-9': '&#xea38;',
		'icon-shopping-bag-10': '&#xea39;',
		'icon-shopping-basket': '&#xea3a;',
		'icon-shopping-cart': '&#xea3b;',
		'icon-shopping-cart-1': '&#xea3c;',
		'icon-shopping-cart-2': '&#xea3d;',
		'icon-shopping-cart-3': '&#xea3e;',
		'icon-shopping-cart-4': '&#xea3f;',
		'icon-shopping-cart-5': '&#xea40;',
		'icon-shopping-cart-6': '&#xea41;',
		'icon-shopping-cart-7': '&#xea42;',
		'icon-shopping-cart-8': '&#xea43;',
		'icon-shopping-cart-9': '&#xea44;',
		'icon-speech-bubble': '&#xea45;',
		'icon-speech-bubble-1': '&#xea46;',
		'icon-tag': '&#xea47;',
		'icon-telephone': '&#xea48;',
		'icon-telephone-1': '&#xea49;',
		'icon-trolley': '&#xea4a;',
		'icon-truck': '&#xea4b;',
		'icon-truck-1': '&#xea4c;',
		'icon-wallet': '&#xea4d;',
		'0': 0
		},
		els = document.getElementsByTagName('*'),
		i, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		c = el.className;
		c = c.match(/icon-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
}());
