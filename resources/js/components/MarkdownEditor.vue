<template>

    <editor
        ref="toastuiEditor"
        @load="onEditorLoad"
        @focus="onEditorFocus"
        @blur="onEditorBlur"
        @change="onEditorChange"
        @stateChange="onEditorStateChange"
        initialEditType="wysiwyg"
        :initialValue="editorText"
        :options="editorOptions"
    />

</template>

<script>
    import 'codemirror/lib/codemirror.css';
    import '@toast-ui/editor/dist/toastui-editor.css';

    import { Editor } from '@toast-ui/vue-editor';


	export default {
		name: 'MarkdownEditor',
        props: {
            guide: String,
            loadoutDescription: String
        },

        components: {
            editor: Editor
        },
        methods: {
            onEditorLoad() {
                // implement your code
            },
            onEditorFocus() {
                // implement your code
            },
            onEditorBlur() {
                let md = this.$refs.toastuiEditor.invoke('getMarkdown');
                this.$emit('update:guide', md);
            },
            onEditorChange() {
                // implement your code
            },
            onEditorStateChange() {
                // implement your code
            }
        },
        data() {
            return {
                editorText: this.loadoutDescription,
                editorOptions: {
                    hideModeSwitch: false,
                    useDefaultHTMLSanitizer: true,
                    usageStatistics: false,
                    toolbarItems: [
                        'heading',
                        'bold',
                        'italic',
                        'strike',
                        'divider',
                        'hr',
                        'quote',
                        'divider',
                        'ul',
                        'ol',
                        'task',
                        'indent',
                        'outdent',
                        'divider',
                        'table',
                        'link',
                        'divider',
                    ]
                }
            };
        }
	};
</script>

<style>
.tui-editor-defaultUI h1, .tui-editor-defaultUI h2, .tui-editor-defaultUI h3, .tui-editor-defaultUI h4 {
    color: #000000;
}
.tui-editor-defaultUI-toolbar {
    background: #18110bba;
}
.tui-editor-defaultUI-toolbar button {
    background-color:#fc9e00;
}
.tui-toolbar-icons {
    background:none; /* Remove default png sprite icons */
}
.tui-editor-defaultUI button.tui-scrollsync, .tui-editor-defaultUI button.tui-scrollsync.active {
    color: #000000;
}
</style>
