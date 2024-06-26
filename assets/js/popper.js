import { popperGenerator, detectOverflow } from "@popperjs/core/dist/esm/createPopper.js";
import eventListeners from "@popperjs/core/dist/esm/modifiers/eventListeners.js";
import popperOffsets from "@popperjs/core/dist/esm/modifiers/popperOffsets.js";
import computeStyles from "@popperjs/core/dist/esm/modifiers/computeStyles.js";
import applyStyles from "@popperjs/core/dist/esm/modifiers/applyStyles.js";
import offset from "@popperjs/core/dist/esm/modifiers/offset.js";
import flip from "@popperjs/core/dist/esm/modifiers/flip.js";
import preventOverflow from "@popperjs/core/dist/esm/modifiers/preventOverflow.js";
import arrow from "@popperjs/core/dist/esm/modifiers/arrow.js";
import hide from "@popperjs/core/dist/esm/modifiers/hide.js";
var defaultModifiers = [eventListeners, popperOffsets, computeStyles, applyStyles, offset, flip, preventOverflow, arrow, hide];
var createPopper = /*#__PURE__*/popperGenerator({
  defaultModifiers: defaultModifiers
}); // eslint-disable-next-line import/no-unused-modules

export { createPopper, popperGenerator, defaultModifiers, detectOverflow }; // eslint-disable-next-line import/no-unused-modules

export { createPopper as createPopperLite } from "@popperjs/core/dist/esm/popper-lite.js"; // eslint-disable-next-line import/no-unused-modules

export * from "@popperjs/core/dist/esm/modifiers/index.js";