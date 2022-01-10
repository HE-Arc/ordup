<template>

    <!-- Create an input with label -->

    <label :for="inputId" :class="labelClass">{{ labelText }}</label>
    <input
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        :type="typeName"
        class="rounded p-1"
        :class="formError ? 'is-invalid' : ''"
        :id="inputId"
        :step="step"
    />
    <BreezeInputError :message="formError" />
</template>

<script>
import BreezeInputError from "@/Components/InputError.vue";
export default {
    components: {
        BreezeInputError,
    },
    props: [
        "modelValue",
        "inputId",
        "labelText",
        "formError",
        "typeName",
        "labelClass",
        "step",
        "password",
        "checkbox",
    ],
    emits: ["update:modelValue"],
};
</script>
