<template>
    <div class="mt-4">

        <file-pond
            name="image"
            ref="pond"
            lable-idle="Click to choose or drop image"
            @init="filepondInitialized"
            accepted-file-types="image/*"
        />

    </div>
</template>

<script>
// Import Vue FilePond
import vueFilePond, { setOptions } from "vue-filepond";
// Import FilePond styles
import "filepond/dist/filepond.min.css";
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";

setOptions ({ 
    server: {
        process: {
            url: './images',
            headers: {
                'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
            }
        }
    }
});

// Create component
const FilePond = vueFilePond( FilePondPluginFileValidateType );

export default {
    components: {
        FilePond
    },
    
    data() {
        return {

        }
    },

    methods: {
        filepondInitialized() {
            console.log("FilePond has initialized", this.$refs.pond);    
        }
    },
}
</script>