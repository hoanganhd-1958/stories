<template>
    <div class="content">
        <div class="chapter-reader">
            <div class="nav">
                <div class="container">
                    <nav
                        aria-label="breadcrumb"
                        class="breadcrumb-container"
                        style="position: relative;"
                    >
                        <div id="configPanel" class="mt-2 pt-3 pb-3">
                            <div class="row">
                                <div class="col-3">
                                    <button
                                        @click="theme-white()"
                                        theme-color="white"
                                        class="btnTheme btn btn-lg btn-block btn-light"
                                    >Trắng</button>
                                </div>
                                <div class="col-3">
                                    <button
                                        @click="theme-sepia()"
                                        theme-color="sepia"
                                        class="btnTheme btn btn-lg btn-block"
                                        style="background-color: #d4c69f; color: #65372B"
                                    >Sepia</button>
                                </div>
                                <div class="col-3">
                                    <button
                                        @click="theme-grey()"
                                        theme-color="gray"
                                        class="btnTheme btn btn-lg btn-block"
                                        style="background-color: #61606c; color: #dfdfe1"
                                    >Xám</button>
                                </div>
                                <div class="col-3">
                                    <button
                                        @click="theme-black()"
                                        theme-color="black"
                                        class="btnTheme btn btn-lg btn-block btn-dark"
                                    >Đen</button>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-4">
                                    <label for>Cỡ chữ</label>
                                    <select
                                        class="form-control"
                                        id="text-size"
                                        @change="changeFontSize($event)"
                                    >
                                        <option
                                            value="16px"
                                            :selected="this.getfontSize === '16px'"
                                        >16</option>
                                        <option
                                            value="18px"
                                            :selected="this.getfontSize === '18px'"
                                        >18</option>
                                        <option
                                            value="20px"
                                            :selected="this.getfontSize === '20px'"
                                        >20</option>
                                        <option
                                            value="22px"
                                            :selected="this.getfontSize === '22px'"
                                        >22</option>
                                        <option
                                            value="24px"
                                            :selected="this.getfontSize === '24px'"
                                        >24</option>
                                        <option
                                            value="26px"
                                            :selected="this.getfontSize === '26px'"
                                        >26</option>
                                        <option
                                            value="28px"
                                            :selected="this.getfontSize === '28px'"
                                        >28</option>
                                        <option
                                            value="30px"
                                            :selected="this.getfontSize === '30px'"
                                        >30</option>
                                        <option
                                            value="32px"
                                            :selected="this.getfontSize === '32px'"
                                        >32</option>
                                        <option
                                            value="34px"
                                            :selected="this.getfontSize === '34px'"
                                        >34</option>
                                        <option
                                            value="36px"
                                            :selected="this.getfontSize === '36px'"
                                        >36</option>
                                        <option
                                            value="38px"
                                            :selected="this.getfontSize === '38px'"
                                        >38</option>
                                        <option
                                            value="40px"
                                            :selected="this.getfontSize === '40px'"
                                        >40</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label for>Giãn dòng</label>
                                    <select
                                        class="form-control"
                                        id="line-height"
                                        @change="changeLineHeight($event)"
                                    >
                                        <option
                                            value="100%"
                                            :selected="this.getlineHeight === '100%'"
                                        >100%</option>
                                        <option
                                            value="120%"
                                            :selected="this.getlineHeight === '120%'"
                                        >120%</option>
                                        <option
                                            value="140%"
                                            :selected="this.getlineHeight === '140%'"
                                        >140%</option>
                                        <option
                                            value="160%"
                                            :selected="this.getlineHeight === '160%'"
                                        >160%</option>
                                        <option
                                            value="180%"
                                            :selected="this.getlineHeight === '180%'"
                                        >180%</option>
                                        <option
                                            value="200%"
                                            :selected="this.getlineHeight === '200%'"
                                        >200%</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label for>Kiểu chữ</label>
                                    <select
                                        class="form-control"
                                        name
                                        id="font-family"
                                        style="font-family: &quot;Roboto Slab&quot;;"
                                        @change="changeFontFamily($event)"
                                    >
                                        <option
                                            style="font-family: 'Roboto Slab"
                                            value="Roboto Slab"
                                            :selected="this.getfontFamily === 'Roboto Slab'"
                                        >Mặc định</option>
                                        <option
                                            style="font-family: 'Merriweather"
                                            value="Merriweather"
                                            :selected="this.getfontFamily === 'Merriweather'"
                                        >Merriweather</option>
                                        <option
                                            style="font-family: 'Sriracha"
                                            value="Sriracha"
                                            :selected="this.getfontFamily === 'Sriracha'"
                                        >Sriracha</option>
                                        <option
                                            style="font-family: 'Itim"
                                            value="Itim"
                                            :selected="this.getfontFamily === 'Itim'"
                                        >Itim</option>
                                        <option
                                            style="font-family: 'Roboto Condensed"
                                            value="Roboto Condensed"
                                            :selected="this.getfontFamily === 'Roboto Condensed'"
                                        >Roboto Condensed</option>
                                        <option
                                            style="font-family: 'Fira Sans Condensed"
                                            value="Fira Sans Condensed"
                                            :selected="this.getfontFamily === 'Fira Sans Condensed'"
                                        >Fira Sans Condensed</option>
                                    </select>
                                </div>
                            </div>
                            <br />
                            <button class="btn btn-danger" @click="closePanel()">Đóng</button>
                            <br />
                        </div>
                    </nav>
                </div>
            </div>
            <div class="content-chapter">
                <div
                    class="header-title"
                    style="text-align: center; margin-top: 25px; font-size: 1em;"
                >
                    <h1 class="header-sub">{{ getChapterContent.story_name }}</h1>
                    <h2 class="header-sub">{{ getChapterContent.name }}</h2>
                    <button class="btn btn-lg btn-dark" id="btnconfig" @click="showPanel()">
                        <i class="fa fa-cogs" aria-hidden="true"></i> Tùy chỉnh
                    </button>
                </div>
                <br />
                <hr />
                <section
                    v-bind:style="styleObject"
                    id="contentText"
                    v-html="getChapterContent.content"
                ></section>
                <hr />
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters, mapActions, mapMutations } from "vuex";
    import $ from "jquery";
    export default {
        data: function() {
            return {
                styleObject: {
                    fontSize: this.getfontSize,
                    lineHeight: this.getlineHeight,
                    fontFamily: this.getfontFamily
                }
            };
        },
        computed: {
            ...mapGetters([
                "getChapterContent",
                "getfontSize",
                "getlineHeight",
                "getfontFamily"
            ])
        },
        methods: {
            ...mapActions({
                fetchChapterContent: "fetchChapterContent"
            }),
            ...mapMutations(["setfontSize", "setlineHeight", "setfontFamily"]),
            showPanel() {
                $("#configPanel").css("display", "block");
            },
            closePanel() {
                $("#configPanel").css("display", "none");
            },
            changeFontSize(event) {
                $("#contentText").css("font-size", event.target.value);
                this.setfontSize(event.target.value);
            },
            changeLineHeight($event) {
                $("#contentText").css("line-height", event.target.value);
                this.setlineHeight(event.target.value);
            },
            changeFontFamily($event) {
                $("#contentText").css("font-family", event.target.value);
                this.setfontFamily(event.target.value);
            }
        },
        created() {
            this.fetchChapterContent(this.$route.params.chapId);
            this.styleObject.fontSize = this.getfontSize;
            this.styleObject.lineHeight = this.getlineHeight;
            this.styleObject.fontFamily = this.getfontFamily;
        }
    };
</script>

<style scoped>
    @import url("https://fonts.googleapis.com/css?family=Itim");
    @import url("https://fonts.googleapis.com/css?family=Fira+Sans+Condensed");
    @import url("https://fonts.googleapis.com/css?family=Roboto+Condensed");
    @import url("https://fonts.googleapis.com/css?family=Sriracha");
    @import url("https://fonts.googleapis.com/css?family=Merriweather");

    .content-chapter {
        font-size: 20px;
        line-height: 140%;
        padding: 35px 50px;
        color: #808080;
        min-height: 600px;
        font-family: "Roboto Slab", serif;
    }

    .pagination {
        font-size: small;
    }

    .chapter-reader {
        position: relative;
    }

    #contentText {
        /*white-space: pre-wrap;*/
    }
    .page {
        border: 1px solid black;
        padding: 5px;
    }

    #configPanel {
        width: 100%;
        display: none;
        border-top: dashed 1px rgba(76, 75, 76, 0.87);
        white-space: normal;
        line-height: 1.5em;
    }

    #btnconfig {
        position: fixed;
        top: 0px;
        right: 0px;
    }

    @media screen and (max-width: 600px) {
        .content-chapter {
            font-size: 20px;
            line-height: 140%;
            padding: 5px;
            color: #808080;
            min-height: 600px;
            font-family: "Roboto Slab", serif;
        }
    }

    .nav {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        overflow: hidden;
        /*max-width: 950px; !*1000 - 50*!*/
    }

    .nav > .container > nav {
        background-color: #2b2b2b;
        background-repeat: repeat;
        padding: 2px 15px;
        border-bottom: dashed 1px rgba(76, 75, 76, 0.87);
    }
</style>
