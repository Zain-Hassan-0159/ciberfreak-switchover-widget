function switch_over_init(){
    const switchover_sections = document.querySelectorAll('.switch_over_section');
    switchover_sections.forEach(element => {
        const switch_input = element.querySelector(".switch input");
        switch_input.addEventListener('change', e => {
            const link_one = element.querySelector('.link_one a');
            const link_two = element.querySelector('.link_two a');
            const tab_one = element.querySelector('.tab_one');
            const tab_two = element.querySelector('.tab_two');
            is_switch_on = e.target.checked;
            if(is_switch_on){
                link_one.classList.remove("active")
                tab_two.classList.remove('d-none')

                link_two.classList.add("active")
                tab_one.classList.add('d-none')
            }else{
                link_two.classList.remove("active")
                tab_one.classList.remove('d-none')  

                link_one.classList.add("active")
                tab_two.classList.add('d-none') 
            }
        })
    });
}

jQuery( function( $ ) {
    if(window.elementor){
    if ( window.elementorFrontend ) {
      elementorFrontend.hooks.addAction( 'frontend/element_ready/cbw.default', function( $scope ) {
        switch_over_init()
      });
    }
  }else{
    switch_over_init()
  }
  });