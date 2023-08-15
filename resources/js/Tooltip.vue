<template>
    <popper :options="popperOptions">
        <template #reference>
            <slot></slot>
        </template>
        <template #popper="{ styles, attributes }">
            <div
                class="tooltip"
                :class="positionClass"
                :style="styles.popper"
                v-bind="attributes.popper"
            >
                {{ text }}
            </div>
        </template>
    </popper>
</template>

<script>
import { Popper, placements } from "vue-popperjs";

export default {
    components: {
        Popper,
    },
    props: {
        position: {
            type: String,
            default: "bottom", // Default position
        },
        text: {
            type: String,
            default: "Tooltip Text",
        },
    },
    computed: {
        popperOptions() {
            return {
                placement: this.position,
            };
        },
        positionClass() {
            return `position-${this.position}`;
        },
    },
};
</script>

<style scoped>
.tooltip {
    background-color: rgba(0, 0, 0, 0.8);
    color: white;
    padding: 5px 10px;
    border-radius: 4px;
    font-size: 14px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}
</style>
