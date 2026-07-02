<script setup>
const props = defineProps({
    item: {
        type: Object,
        required: true,
    },
});

function increment() {
    // eslint-disable-next-line vue/no-mutating-props -- keeps the cart total in sync immediately
    props.item.quantity += 1;
}

function decrement() {
    if (props.item.quantity > 1) {
        // eslint-disable-next-line vue/no-mutating-props -- keeps the cart total in sync immediately
        props.item.quantity -= 1;
    }
}
</script>

<template>
    <div class="flex items-center justify-between py-2">
        <span class="font-medium">{{ item.name }}</span>
        <div class="flex items-center gap-2">
            <button @click="decrement" class="rounded bg-gray-200 px-2">-</button>
            <span>{{ item.quantity }}</span>
            <button @click="increment" class="rounded bg-gray-200 px-2">+</button>
        </div>
    </div>
</template>
