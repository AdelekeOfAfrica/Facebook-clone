<script setup>
import { ref } from 'vue';
import { Link,usePage } from '@inertiajs/vue3';
import Magnify from 'vue-material-design-icons/Magnify.vue';
import Home from 'vue-material-design-icons/Home.vue';
import HomeOutline from 'vue-material-design-icons/HomeOutline.vue';
import TelevisionPlay from 'vue-material-design-icons/TelevisionPlay.vue';
import StoreFrontOutline from 'vue-material-design-icons/StoreFrontOutline.vue';
import AccountGroup from 'vue-material-design-icons/AccountGroup.vue';
import ControllerClassicOutline from 'vue-material-design-icons/ControllerClassicOutline.vue';
import FacebookMessenger from 'vue-material-design-icons/FacebookMessenger.vue';
import Bell from 'vue-material-design-icons/Bell.vue';
import Logout from 'vue-material-design-icons/Logout.vue';

import {useGeneralStore} from '@/Stores/general';
import {storeToRefs} from 'pinia';

const useGeneral =  useGeneralStore();
const {isPostOverlay, isCropperModal, isImageDisplay} = storeToRefs(useGeneral);

const user =usePage().props.auth.user;
let showMenu =ref(false);

</script>

<template>
   <div id="MainNav" class="fixed z-50 w-full flex items-center justify-between h-[56px] bg-white shadow-xl border-b">
   Cool
   </div>
   <slot />
</template>
