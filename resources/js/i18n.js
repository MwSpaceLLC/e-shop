/*=========================================================================================
  Item Name: e-shop - Perfect Laravel commerce Backend
  Author: Aleksandr Ivanovitch
  Author URL: https://it-it.facebook.com/Aleksandr.Ivanovitch.Brunelli
==========================================================================================*/

import Vue from 'vue'
import VueI18n from 'vue-i18n'
import i18nData from '../lang/i18n'

Vue.use(VueI18n);

export default new VueI18n({
    locale: document.querySelector('html').getAttribute('lang'), // set default locale
    messages: i18nData,
})
