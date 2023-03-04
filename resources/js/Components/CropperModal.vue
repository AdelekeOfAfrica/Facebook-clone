<script setup>
    import { ref } from 'vue';
    import { router } from '@inertiajs/vue3';
    import { Cropper, CircleStencil } from 'vue-advanced-cropper'
    import Close from 'vue-material-design-icons/Close.vue'
    import Plus from 'vue-material-design-icons/Plus.vue'
    import 'vue-advanced-cropper/dist/style.css';
    const emit = defineEmits(['showModal'])
    let fileInput = ref(null)
    let cropper = ref(null)
    let uploadedImage = ref(null)
    let croppedImageData = {
        file: null,
        imageUrl: null,
        height: null,
        width: null,
        left: null,
        top: null,
    }
    const getUploadedImage = (e) => {
        const file = e.target.files[0]
        uploadedImage.value = URL.createObjectURL(file)
    }
    const crop = () => {
        const { coordinates, canvas } = cropper.value.getResult()
        croppedImageData.imageUrl = canvas.toDataURL()
        let data = new FormData();
        data.append('image', fileInput.value.files[0] || '')
        data.append('height', coordinates.height || '')
        data.append('width', coordinates.width || '')
        data.append('left', coordinates.left || '')
        data.append('top', coordinates.top || '')
      
        emit('showModal', false)
    }
</script>

<template>
    <div class="fixed z-50">
        <div class="fixed inset-0 bg-white bg-opacity-60"></div>
        <div class="fixed inset-0 z-10 ocerflow-y-auto">
            <div class="flex flex-col min-h-full justify-center items-center py-2">
                <div class="transform overflow-hidden rounded-lg bg-white shadow-2xl transition-all max-w-xl">
                    <div class="flex items-center py-4 border-b border-b-gray-300">
                        <div class="text-[22px] font-extrabold w-full text-center">
                            Update Profile Picture
                        </div>
                        <div @click="$emit('showModal', false)" class="absolute right-3 rounded-full  p-1.5 bg-gray-300 cursor-pointer">
                            <Close :size="28" fillColor="#5E6771" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>