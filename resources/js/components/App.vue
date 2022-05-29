<template>
    <div class="mt-4">

        <file-pond
            name="image"
            ref="pond"
            lable-idle="Click to choose or drop image"
            server="/images"
            @init="filepondInitialized"
            accepted-file-types="image/*"
        />

    </div>
</template>

<script>
// Import Vue FilePond
import vueFilePond from "vue-filepond";

// Import FilePond styles
import "filepond/dist/filepond.min.css";

import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";

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