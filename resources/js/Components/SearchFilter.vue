<script setup>
const props = defineProps({
    modelValue: {
        type: String,
        default: "",
    },
    placeholder: {
        type: String,
        default: "Search...",
    },
});

const emit = defineEmits(["update:modelValue"]);

function onInput(event) {
    emit("update:modelValue", event.target.value);
}
</script>

<template>
    <input
        :value="modelValue"
        type="text"
        :placeholder="placeholder"
        class="w-full rounded-md border-gray-300 shadow-sm"
        @input="onInput"
    />
</template>
