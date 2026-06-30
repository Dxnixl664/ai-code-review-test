import pluginVue from "eslint-plugin-vue";
import prettierConfig from "@vue/eslint-config-prettier";

export default [
    ...pluginVue.configs["flat/recommended"],
    prettierConfig,
    {
        files: ["resources/js/**/*.{js,vue}"],
        rules: {
            "vue/multi-word-component-names": "off",
        },
    },
    {
        ignores: ["public/**", "vendor/**", "node_modules/**", "bootstrap/cache/**"],
    },
];
