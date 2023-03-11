require([
    'jquery'
], function ($) {
    $(document).ready(function(){
        const itemData = window.checkoutConfig.quoteItemData;
        const influenzaCovidConfig = window.checkoutConfig.influenzaCovidConfig;
        const influenzaCovidItem = itemData.filter(item => item.sku == influenzaCovidConfig.influenzaCovidSku);
                    if (influenzaCovidItem.length === 1) {
                        const interval = setInterval(function(){
                            if($('.opc-block-shipping-information').length){
                                const covidInfluenzaAviso = `<p id="covid-influenza-aviso" style="color: #C80B0B;background-color: rgb(250, 229, 229);border: 1px solid rgb(224, 43, 39);padding: 5px; margin-top: 50px;">${influenzaCovidConfig.aviso}</p>`;
                                $('.opc-block-shipping-information').append(covidInfluenzaAviso);        
                                clearInterval(interval);
                            }                            
                        },1000);
                        
                    } 

    });
    
});