(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[17],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Routes/Shops/Shops.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Routes/Shops/Shops.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _StyledComponents_Heading__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../StyledComponents/Heading */ "./resources/js/components/StyledComponents/Heading.vue");
/* harmony import */ var _StyledComponents_Buttons_PlusButton__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../StyledComponents/Buttons/PlusButton */ "./resources/js/components/StyledComponents/Buttons/PlusButton.vue");
/* harmony import */ var _Loading__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../Loading */ "./resources/js/components/Loading.vue");
/* harmony import */ var _StyledComponents_CardGrid__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../StyledComponents/CardGrid */ "./resources/js/components/StyledComponents/CardGrid.vue");
/* harmony import */ var _StyledComponents_Card__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../../StyledComponents/Card */ "./resources/js/components/StyledComponents/Card.vue");
/* harmony import */ var _Mixins_WithFormatShops__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../../Mixins/WithFormatShops */ "./resources/js/components/Mixins/WithFormatShops.js");
/* harmony import */ var _Repositories_RepositoryFactory__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ../../../Repositories/RepositoryFactory */ "./resources/js/Repositories/RepositoryFactory.js");


function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

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
//
//
//
//
//
//
//
//
//







var ShopRepository = _Repositories_RepositoryFactory__WEBPACK_IMPORTED_MODULE_7__["RepositoryFactory"].get('shop');
/* harmony default export */ __webpack_exports__["default"] = ({
  mixins: [_Mixins_WithFormatShops__WEBPACK_IMPORTED_MODULE_6__["default"]],
  components: {
    Heading: _StyledComponents_Heading__WEBPACK_IMPORTED_MODULE_1__["default"],
    PlusButton: _StyledComponents_Buttons_PlusButton__WEBPACK_IMPORTED_MODULE_2__["default"],
    Loading: _Loading__WEBPACK_IMPORTED_MODULE_3__["default"],
    CardGrid: _StyledComponents_CardGrid__WEBPACK_IMPORTED_MODULE_4__["default"],
    Card: _StyledComponents_Card__WEBPACK_IMPORTED_MODULE_5__["default"]
  },
  data: function data() {
    return {
      isLoading: false,
      shops: []
    };
  },
  created: function created() {
    this.fetchShops();
  },
  methods: {
    fetchShops: function () {
      var _fetchShops = _asyncToGenerator(
      /*#__PURE__*/
      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
        var _ref, data;

        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                _context.next = 2;
                return ShopRepository.get();

              case 2:
                _ref = _context.sent;
                data = _ref.data;
                this.isLoading = false;
                this.shops = data;

              case 6:
              case "end":
                return _context.stop();
            }
          }
        }, _callee, this);
      }));

      function fetchShops() {
        return _fetchShops.apply(this, arguments);
      }

      return fetchShops;
    }()
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Loading.vue?vue&type=template&id=6ca9e6be&":
/*!**********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Loading.vue?vue&type=template&id=6ca9e6be& ***!
  \**********************************************************************************************************************************************************************************************************/
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
  return _c("span", [_vm._t("default", [_vm._v("Loading ...")])], 2)
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Routes/Shops/Shops.vue?vue&type=template&id=da3b81de&":
/*!*********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Routes/Shops/Shops.vue?vue&type=template&id=da3b81de& ***!
  \*********************************************************************************************************************************************************************************************************************/
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
  return _c("section", [
    _c(
      "div",
      { staticClass: "flex" },
      [
        _c("Heading", [_vm._v("Shops")]),
        _vm._v(" "),
        _c(
          "router-link",
          { attrs: { to: { name: "shops.create" } } },
          [_c("PlusButton")],
          1
        )
      ],
      1
    ),
    _vm._v(" "),
    _c(
      "div",
      { staticClass: "mt-2 sm:mt-4" },
      [
        _vm.isLoading ? _c("Loading", [_vm._v("Loading shops ...")]) : _vm._e(),
        _vm._v(" "),
        _c(
          "CardGrid",
          _vm._l(_vm.shops, function(shop) {
            return _c(
              "router-link",
              {
                key: shop.id,
                attrs: { to: { name: "shops.show", params: { id: shop.id } } }
              },
              [
                _c("Card", {
                  attrs: {
                    heading: shop.name,
                    "sub-heading": _vm.formatShopGroceries(shop.groceries_count)
                  }
                })
              ],
              1
            )
          }),
          1
        )
      ],
      1
    )
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/Loading.vue":
/*!*********************************************!*\
  !*** ./resources/js/components/Loading.vue ***!
  \*********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Loading_vue_vue_type_template_id_6ca9e6be___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Loading.vue?vue&type=template&id=6ca9e6be& */ "./resources/js/components/Loading.vue?vue&type=template&id=6ca9e6be&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");

var script = {}


/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_1__["default"])(
  script,
  _Loading_vue_vue_type_template_id_6ca9e6be___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Loading_vue_vue_type_template_id_6ca9e6be___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/Loading.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/Loading.vue?vue&type=template&id=6ca9e6be&":
/*!****************************************************************************!*\
  !*** ./resources/js/components/Loading.vue?vue&type=template&id=6ca9e6be& ***!
  \****************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Loading_vue_vue_type_template_id_6ca9e6be___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./Loading.vue?vue&type=template&id=6ca9e6be& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Loading.vue?vue&type=template&id=6ca9e6be&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Loading_vue_vue_type_template_id_6ca9e6be___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Loading_vue_vue_type_template_id_6ca9e6be___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/Mixins/WithFormatShops.js":
/*!***********************************************************!*\
  !*** ./resources/js/components/Mixins/WithFormatShops.js ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ({
  methods: {
    formatShopGroceries: function formatShopGroceries(groceriesCount) {
      return "".concat(groceriesCount, " groceries");
    }
  }
});

/***/ }),

/***/ "./resources/js/components/Routes/Shops/Shops.vue":
/*!********************************************************!*\
  !*** ./resources/js/components/Routes/Shops/Shops.vue ***!
  \********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Shops_vue_vue_type_template_id_da3b81de___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Shops.vue?vue&type=template&id=da3b81de& */ "./resources/js/components/Routes/Shops/Shops.vue?vue&type=template&id=da3b81de&");
/* harmony import */ var _Shops_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Shops.vue?vue&type=script&lang=js& */ "./resources/js/components/Routes/Shops/Shops.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Shops_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Shops_vue_vue_type_template_id_da3b81de___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Shops_vue_vue_type_template_id_da3b81de___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/Routes/Shops/Shops.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/Routes/Shops/Shops.vue?vue&type=script&lang=js&":
/*!*********************************************************************************!*\
  !*** ./resources/js/components/Routes/Shops/Shops.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Shops_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Shops.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Routes/Shops/Shops.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Shops_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/Routes/Shops/Shops.vue?vue&type=template&id=da3b81de&":
/*!***************************************************************************************!*\
  !*** ./resources/js/components/Routes/Shops/Shops.vue?vue&type=template&id=da3b81de& ***!
  \***************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Shops_vue_vue_type_template_id_da3b81de___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Shops.vue?vue&type=template&id=da3b81de& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Routes/Shops/Shops.vue?vue&type=template&id=da3b81de&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Shops_vue_vue_type_template_id_da3b81de___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Shops_vue_vue_type_template_id_da3b81de___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);