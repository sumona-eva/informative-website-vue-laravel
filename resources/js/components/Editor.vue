<template>
    <div>
        <QuillEditor v-model="content" ref="quillEditor" />
        {{ content }}
        <button @click="getPlainText">Get Plain Text</button>
    </div>
</template>

<script>
import { ref, onMounted } from 'vue';
import { QuillEditor } from '@vueup/vue-quill';

export default {
    components: {
        QuillEditor
    },
    setup() {
        const content = ref('');
        const quillEditor = ref(null);

        onMounted(() => {
            quillEditor.value.quill.on('text-change', () => {
                const plainText = quillEditor.value.quill.getText();
                console.log(plainText);
            });
        });

        const getPlainText = () => {
            const plainText = quillEditor.value.quill.getText();
            console.log('Plain Text:', plainText);
        };

        return {
            content,
            quillEditor,
            getPlainText
        };
    }
};
</script>
