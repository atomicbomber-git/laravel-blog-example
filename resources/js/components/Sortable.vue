<template>
    <div>
        <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facilis corrupti vero aliquid perferendis reiciendis nisi sed, molestias perspiciatis officiis ullam totam laudantium suscipit veniam quas libero sunt illum soluta architecto.
        </p>

        <slot :records="records" :headers="headers"> </slot>
    </div>
</template>

<script>
export default {
    props: ['records', 'headers']
}
</script>
