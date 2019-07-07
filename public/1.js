(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[1],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/StyledComponents/Card.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/StyledComponents/Card.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Checkbox__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Checkbox */ "./resources/js/components/StyledComponents/Checkbox.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    Checkbox: _Checkbox__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  props: {
    heading: String,
    subHeading: String,
    leftBottom: String,
    inactive: {
      "default": false
    },
    iconVisible: {
      "default": false
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/StyledComponents/CardGrid.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/StyledComponents/CardGrid.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
function mapClasses(slot) {
  if (slot.data) {
    slot.data["class"] = Object.assign({}, slot.data["class"], {
      'w-full': true,
      'sm:px-2': true,
      'sm:w-1/2': true,
      'md:w-1/3': true,
      'lg:w-1/4': true,
      'xl:w-1/5': true,
      'mt-2': true,
      'sm:mt-4': true
    });
  }

  return slot;
}

/* harmony default export */ __webpack_exports__["default"] = ({
  render: function render(createElement) {
    var slots = {};

    if (this.$slots["default"]) {
      slots = this.$slots["default"].map(function (slot) {
        return mapClasses(slot);
      });
    } else if (this.$scopedSlots["default"]) {
      slots = this.$slots["default"].map(function (slot) {
        return mapClasses(slot);
      });
    }

    return createElement('div', {
      attrs: {
        "class": 'flex flex-col sm:flex-row sm:flex-wrap sm:-mx-2'
      }
    }, slots);
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/StyledComponents/Checkbox.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/StyledComponents/Checkbox.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  props: {
    checked: {
      "default": false
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/StyledComponents/Buttons/PlusButton.vue?vue&type=template&id=57ce5065&functional=true&":
/*!******************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/StyledComponents/Buttons/PlusButton.vue?vue&type=template&id=57ce5065&functional=true& ***!
  \******************************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function(_h, _vm) {
  var _c = _vm._c
  return _vm._m(0)
}
var staticRenderFns = [
  function(_h, _vm) {
    var _c = _vm._c
    return _c(
      "button",
      {
        staticClass:
          "ml-4 text-3xl text-gray-800 hover:text-gray-600 focus:outline-none"
      },
      [_c("i", { staticClass: "fa fa-plus" })]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/StyledComponents/Card.vue?vue&type=template&id=697e6cdb&":
/*!************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/StyledComponents/Card.vue?vue&type=template&id=697e6cdb& ***!
  \************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "cursor-pointer" }, [
    _c(
      "div",
      {
        staticClass:
          "flex flex-col lg:w-56 h-40 rounded-lg p-4 hover:bg-gray-800",
        class: { "bg-gray-600": !_vm.inactive, "bg-gray-500": _vm.inactive }
      },
      [
        _c("div", { staticClass: "flex justify-between items-center" }, [
          _c("h3", { staticClass: "text-lg text-gray-100 w-full" }, [
            _vm._v(_vm._s(_vm.heading))
          ]),
          _vm._v(" "),
          _c(
            "span",
            { staticClass: "inline-block text-right" },
            [
              _vm.iconVisible
                ? _c("Checkbox", { attrs: { checked: true } })
                : _vm._e()
            ],
            1
          )
        ]),
        _vm._v(" "),
        _c("span", { staticClass: "text-sm text-gray-200" }, [
          _vm._v(_vm._s(_vm.subHeading))
        ]),
        _vm._v(" "),
        _c(
          "strong",
          { staticClass: "mt-auto text-base font-bold text-gray-100" },
          [_vm._v(_vm._s(_vm.leftBottom))]
        )
      ]
    )
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/StyledComponents/Checkbox.vue?vue&type=template&id=2448aa8e&":
/*!****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/StyledComponents/Checkbox.vue?vue&type=template&id=2448aa8e& ***!
  \****************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "span",
    { staticClass: "flex rounded rounded-full h-5 w-5 bg-gray-100" },
    [
      _c("i", {
        directives: [
          {
            name: "show",
            rawName: "v-show",
            value: _vm.checked,
            expression: "checked"
          }
        ],
        staticClass: "fa fa-xs fa-check text-gray-800 m-auto",
        staticStyle: { "margin-top": "5px" }
      })
    ]
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/StyledComponents/Heading.vue?vue&type=template&id=72dbe787&":
/*!***************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/StyledComponents/Heading.vue?vue&type=template&id=72dbe787& ***!
  \***************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "h1",
    { staticClass: "text-3xl font-bold text-gray-800" },
    [_vm._t("default")],
    2
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/StyledComponents/Buttons/PlusButton.vue":
/*!*************************************************************************!*\
  !*** ./resources/js/components/StyledComponents/Buttons/PlusButton.vue ***!
  \*************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _PlusButton_vue_vue_type_template_id_57ce5065_functional_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./PlusButton.vue?vue&type=template&id=57ce5065&functional=true& */ "./resources/js/components/StyledComponents/Buttons/PlusButton.vue?vue&type=template&id=57ce5065&functional=true&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");

var script = {}


/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_1__["default"])(
  script,
  _PlusButton_vue_vue_type_template_id_57ce5065_functional_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _PlusButton_vue_vue_type_template_id_57ce5065_functional_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  true,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/StyledComponents/Buttons/PlusButton.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/StyledComponents/Buttons/PlusButton.vue?vue&type=template&id=57ce5065&functional=true&":
/*!************************************************************************************************************************!*\
  !*** ./resources/js/components/StyledComponents/Buttons/PlusButton.vue?vue&type=template&id=57ce5065&functional=true& ***!
  \************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PlusButton_vue_vue_type_template_id_57ce5065_functional_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./PlusButton.vue?vue&type=template&id=57ce5065&functional=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/StyledComponents/Buttons/PlusButton.vue?vue&type=template&id=57ce5065&functional=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PlusButton_vue_vue_type_template_id_57ce5065_functional_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PlusButton_vue_vue_type_template_id_57ce5065_functional_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/StyledComponents/Card.vue":
/*!***********************************************************!*\
  !*** ./resources/js/components/StyledComponents/Card.vue ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Card_vue_vue_type_template_id_697e6cdb___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Card.vue?vue&type=template&id=697e6cdb& */ "./resources/js/components/StyledComponents/Card.vue?vue&type=template&id=697e6cdb&");
/* harmony import */ var _Card_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Card.vue?vue&type=script&lang=js& */ "./resources/js/components/StyledComponents/Card.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Card_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Card_vue_vue_type_template_id_697e6cdb___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Card_vue_vue_type_template_id_697e6cdb___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/StyledComponents/Card.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/StyledComponents/Card.vue?vue&type=script&lang=js&":
/*!************************************************************************************!*\
  !*** ./resources/js/components/StyledComponents/Card.vue?vue&type=script&lang=js& ***!
  \************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Card_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Card.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/StyledComponents/Card.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Card_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/StyledComponents/Card.vue?vue&type=template&id=697e6cdb&":
/*!******************************************************************************************!*\
  !*** ./resources/js/components/StyledComponents/Card.vue?vue&type=template&id=697e6cdb& ***!
  \******************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Card_vue_vue_type_template_id_697e6cdb___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Card.vue?vue&type=template&id=697e6cdb& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/StyledComponents/Card.vue?vue&type=template&id=697e6cdb&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Card_vue_vue_type_template_id_697e6cdb___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Card_vue_vue_type_template_id_697e6cdb___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/StyledComponents/CardGrid.vue":
/*!***************************************************************!*\
  !*** ./resources/js/components/StyledComponents/CardGrid.vue ***!
  \***************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _CardGrid_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./CardGrid.vue?vue&type=script&lang=js& */ "./resources/js/components/StyledComponents/CardGrid.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");
var render, staticRenderFns




/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_1__["default"])(
  _CardGrid_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"],
  render,
  staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/StyledComponents/CardGrid.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/StyledComponents/CardGrid.vue?vue&type=script&lang=js&":
/*!****************************************************************************************!*\
  !*** ./resources/js/components/StyledComponents/CardGrid.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CardGrid_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./CardGrid.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/StyledComponents/CardGrid.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CardGrid_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/StyledComponents/Checkbox.vue":
/*!***************************************************************!*\
  !*** ./resources/js/components/StyledComponents/Checkbox.vue ***!
  \***************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Checkbox_vue_vue_type_template_id_2448aa8e___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Checkbox.vue?vue&type=template&id=2448aa8e& */ "./resources/js/components/StyledComponents/Checkbox.vue?vue&type=template&id=2448aa8e&");
/* harmony import */ var _Checkbox_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Checkbox.vue?vue&type=script&lang=js& */ "./resources/js/components/StyledComponents/Checkbox.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Checkbox_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Checkbox_vue_vue_type_template_id_2448aa8e___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Checkbox_vue_vue_type_template_id_2448aa8e___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/StyledComponents/Checkbox.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/StyledComponents/Checkbox.vue?vue&type=script&lang=js&":
/*!****************************************************************************************!*\
  !*** ./resources/js/components/StyledComponents/Checkbox.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Checkbox_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Checkbox.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/StyledComponents/Checkbox.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Checkbox_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/StyledComponents/Checkbox.vue?vue&type=template&id=2448aa8e&":
/*!**********************************************************************************************!*\
  !*** ./resources/js/components/StyledComponents/Checkbox.vue?vue&type=template&id=2448aa8e& ***!
  \**********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Checkbox_vue_vue_type_template_id_2448aa8e___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Checkbox.vue?vue&type=template&id=2448aa8e& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/StyledComponents/Checkbox.vue?vue&type=template&id=2448aa8e&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Checkbox_vue_vue_type_template_id_2448aa8e___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Checkbox_vue_vue_type_template_id_2448aa8e___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/StyledComponents/Heading.vue":
/*!**************************************************************!*\
  !*** ./resources/js/components/StyledComponents/Heading.vue ***!
  \**************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Heading_vue_vue_type_template_id_72dbe787___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Heading.vue?vue&type=template&id=72dbe787& */ "./resources/js/components/StyledComponents/Heading.vue?vue&type=template&id=72dbe787&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");

var script = {}


/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_1__["default"])(
  script,
  _Heading_vue_vue_type_template_id_72dbe787___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Heading_vue_vue_type_template_id_72dbe787___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/StyledComponents/Heading.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/StyledComponents/Heading.vue?vue&type=template&id=72dbe787&":
/*!*********************************************************************************************!*\
  !*** ./resources/js/components/StyledComponents/Heading.vue?vue&type=template&id=72dbe787& ***!
  \*********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Heading_vue_vue_type_template_id_72dbe787___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Heading.vue?vue&type=template&id=72dbe787& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/StyledComponents/Heading.vue?vue&type=template&id=72dbe787&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Heading_vue_vue_type_template_id_72dbe787___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Heading_vue_vue_type_template_id_72dbe787___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);