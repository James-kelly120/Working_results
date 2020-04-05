<template>
    <div class="slide-show">
        <span>Slide Show Example</span>

        <!-- slide main body -->
        <div class="main-body">
            <div
                class="slide"
                v-for="(bk, index) in backgrounds"
                :key="index"
                :style="{'background-image': 'url(' + static_url + bk.name + ')', 'left': bk.left + '%'}"
            >
            </div>
            <div class="dots">
               <div
               @click="selectDot(item)"
               :key="index"
               v-for="(item, index) in items"
               :class="(item === selected)?'select-dot': 'dot'"></div>
            </div>
        </div>

        <!-- go to no-scroll-section -->
        <button @click="goNoScroll">Go No-Scroll-Section</button>
    </div>
</template>

<script>
export default {
    name: 'Slideshow',
    data () {
        return {
            items: [1, 2, 3],
            selected: 1,
            static_url: '../static/images/',
            backgrounds: [
                { 'name': 'background1.png', 'left': 0 },
                { 'name': 'background2.png', 'left': 100 },
                { 'name': 'background3.png', 'left': 200 }
            ]
        }
    },
    methods: {
        goNoScroll: function () {
            this.$router.push({name: 'NoScrollSection'})
        },
        selectDot: function (dot) {
            this.selected = dot
            switch (dot) {
            case 1:
                this.backgrounds[0].left = 0
                this.backgrounds[1].left = 100
                this.backgrounds[2].left = 200
                break
            case 2:
                this.backgrounds[0].left = -100
                this.backgrounds[1].left = 0
                this.backgrounds[2].left = 100
                break
            case 3:
                this.backgrounds[0].left = -200
                this.backgrounds[1].left = -100
                this.backgrounds[2].left = 0
                break
            default:
                break
            }
        }
    }
}
</script>
