<template>
    <div >
        <div class="mt-4 pl-80 pr-80">
            <file-pond
                name="image"
                ref="pond"
                lable-idle="Click to choose or drop image"
                @init="filepondInitialized"
                accepted-file-types="image/jpg, image/jpeg, image/png"
                allowMultiple="true"
                @processfile="handleProcessedFile"
                max-file-size="1MB"
            />
        </div>
        <div class="mt-8 mb-24">
            <h3 class="text-2xl font-medium text-center">Image Gallery</h3>
            <div class="flex justify-center mt-4">
                <div class="p-1" v-for="(image, index) in images" :key="index" >
                    <img :src="'/storage/images/' + image">
                    <!-- <button @click="removeImage(index)" class="bg-red-500 text-white p-2 rounded-full">Remove</button> -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import vueFilePond, { setOptions } from "vue-filepond";
import "filepond/dist/filepond.min.css";
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePondPluginFileValidateSize from "filepond-plugin-file-validate-size";
import axios from "axios";

let serverMessage = {};

setOptions ({ 
    server: {
        process: {
            url: './images',
            onerror: (response) =>{
                serverMessage = JSON.parse(response);
            },
            headers: {
                'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
            }
        }
    },
    labelFileProcessingError: () => {
        return serverMessage.error;
    },
});

// Create component
const FilePond = vueFilePond( FilePondPluginFileValidateType, FilePondPluginFileValidateSize );

export default {
    components: {
        FilePond
    },
    
    data() {
        return {
            images: [],
        }
    },

    mounted() {
        axios.get('/images')
            .then(response => {
                this.images = response.data;
            })
            .catch(error => {
                console.log(error);
            })
    },

    methods: {
        filepondInitialized() {
            console.log("FilePond has initialized", this.$refs.pond);    
        },

        handleProcessedFile (error, file) {
            if (error) {
                console.error("Error processing file", error);
                return;
            }
            console.log("Processed file", file);
            this.images.unshift(file.serverId);
        },
    },

}
</script>