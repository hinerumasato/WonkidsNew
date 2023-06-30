const app = {
    
    $: document.querySelector.bind(),
    $$: document.querySelectorAll.bind(),

    navLinks: document.querySelectorAll('.nav-link'),

    handleEvent: function() {
        
    },

    init: function() {
        this.navLinks.forEach(link => {
            const windowLink = window.location.href;
            const href = link.getAttribute('href');
            
            if(link.classList.contains('active'))
                link.classList.remove('active');

            if(href === windowLink)
                link.classList.add('active');
        });
    },

    start: function() {
        this.init();
        this.handleEvent();
    }
}.start();