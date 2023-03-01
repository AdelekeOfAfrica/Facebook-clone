<script setup>
import {toRefs, reactive} from 'vue';
import {Link, router} from '@inertiajs/vue3';

import AccountMultiple from 'vue-material-design-icons/AccountMultiple.vue';
import ThumbUp from 'vue-material-design-icons/ThumbUp.vue';
import Check from 'vue-material-design-icons/Check.vue';
import Delete from 'vue-material-design-icons/Delete.vue'

import {useGeneralStore} from '@/Stores/general';
import {storeToRefs} from 'pinia';

const useGeneral =  useGeneralStore();
const {isPostOverlay} = storeToRefs(useGeneral);

const form = reactive({comment:null});

//const props = defineProps({
//    user:Object,
//    post:Object,
//    comments:Object
//});
//
//const {user, post, comments} = toRefs(props);//
</script>


<template>
    <div id="Post" class="w-full bg-white rounded-lg my-4 shadow-md">
        <div class="flex items-center py-3 px-3">
            <button class="mr-2">
                <img class="rounded-full ml-1 min-w-[42px] max-h-[42px]" src="https://picsum.photos/id/87/300/320">
            </button>

            <div class="flex items-center justify-between p-2 rounded-full w-full">
                <div>
                    <div class="font-extrabold text-[15px]">AdelekeOfAfrica</div>
                    <div class="flex items-center text-xs text-gray-600">
                      14h <AccountMultiple class="ml-1" :size="15" fillColor="#64676B" />
                    </div>
                </div>

                <div class="flex items-center">
                    <button class="rounded-full p-1.5 cursor-pointer hover:bg-[#F2F2F2]">
                        <Delete fillColor="#64676B" />
                    </button>
                </div>
            </div>
        </div>

        <div class="px-5 pb-2 text-[17px] font-semibold">
            "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, 
            vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"
        </div>
        <img class="mx-auto cursor-pointer" src="https://picsum.photos/id/189/800/800"/>
        <div id="Likes" class="px-5">
            <div class="flex items-center justify-between py-3 border-b">
                <ThumbUp fillColor="#1D72E2" :size="16" />
                <div class="text-sm text-gray-600 font-semibold"> 5 Comments </div>
            </div>
        </div>

        <div id="comments" class="px-3">
            <div id="CreateComment" class="flex items-center justify-between py-2">
                <div class="flex items-center w-full">
                    <Link href="/" class="mr-2">
                        <img class="rounded-full ml-1 min-w-[36px] max-h-[36px]" src="https://picsum.photos/id/189/800/800"/>
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>

