(function($) {
    $.fn.pyxleForms = function(options) {
        var opts = $.extend({}, $.fn.pyxleForms.defaults, options);
        if ($(this).length == 0) {
            if (window.console && window.console.log) {
                window.console.log('Element does not exist in DOM!')
            } else {
                alert('Element does not exist in DOM!')
            }
            return !1
        }
        var that = $(this);
        var thatData = null;
        var timeOut = null;
        if (opts.autoUpdate) {
            if (thatData == null) {
                thatData = that.serializeArray();
                init()
            }
            if (timeOut) clearTimeout(timeOut);
            timeOut = setInterval(function() {
                if (thatData.length != that.serializeArray().length) {
                    thatData = diffObjElems(that.serializeArray(), thatData);
                    init();
                    thatData = that.serializeArray()
                }
            }, opts.autoUpdateEvery)
        } else {
            thatData = that.serializeArray();
            init()
        }

        function init() {
            if (thatData && thatData.length) {
                $.each(thatData, function(key, value) {
                    var elemName = value.name;
                    if (elemName && typeof(opts.prefillFormData[0]) != 'undefined') {
                        jQuery("input[name='" + elemName + "']").each(function() {
                            var elemThis = this;
                            var innerVal = getElemValueByObj(opts.prefillFormData[0], elemName);
                            if (innerVal != null) {
                                if (innerVal.indexOf("no_") == -1) {
                                    if (opts.rules.length) {
                                        var isPresent = !1;
                                        $.each(opts.rules, function(key, value) {
                                            if (value.elementName == elemName) {
                                                isPresent = !0;
                                                if (value.splitBy) {
                                                    var splitedVals = innerVal.split(value.splitBy);
                                                    if (splitedVals.length) {
                                                        if (value.setTo) {
                                                            $.each(value.setTo, function(key, value) {
                                                                var elemSplitedName = value;
                                                                jQuery("input[name='" + elemSplitedName + "']").each(function() {
                                                                    var thisElem = this;
                                                                    $(thisElem).val(splitedVals[key])
                                                                });
                                                                jQuery("select[name='" + elemSplitedName + "']").each(function() {
                                                                    var thisElem = this;
                                                                    $(thisElem).val(splitedVals[key])
                                                                });
                                                                jQuery("textarea[name='" + elemSplitedName + "']").each(function() {
                                                                    var thisElem = this;
                                                                    $(thisElem).val(splitedVals[key])
                                                                });
                                                                jQuery("button[name='" + elemSplitedName + "']").each(function() {
                                                                    var thisElem = this;
                                                                    $(thisElem).val(splitedVals[key])
                                                                })
                                                            })
                                                        }
                                                    }
                                                }
                                                if (value.convertTo) {
                                                    $.each(value.convertTo, function(key, value) {
                                                        if (innerVal == key) {
                                                            $(elemThis).val(innerVal)
                                                        }
                                                    })
                                                }
                                                if (value.formatAfter) {
                                                    if (value.formatAfter.type == 'date') {
                                                        var formatedVal = moment(innerVal).format(value.formatAfter.format);
                                                        $(elemThis).val(formatedVal)
                                                    }
                                                }
                                            } else {
                                                if (!isPresent) {
                                                    $(elemThis).val(innerVal)
                                                }
                                            }
                                        })
                                    } else {
                                        $(elemThis).val(innerVal)
                                    }
                                }
                            }
                        });
                        jQuery("select[name='" + elemName + "']").each(function() {
                            var elemThis = this;
                            var innerVal = getElemValueByObj(opts.prefillFormData[0], elemName);
                            if (innerVal != null) {
                                if (innerVal.indexOf("no_") == -1) {
                                    if (opts.rules.length) {
                                        var isPresent = !1;
                                        $.each(opts.rules, function(key, value) {
                                            if (value.elementName == elemName) {
                                                isPresent = !0;
                                                if (value.splitBy) {
                                                    var splitedVals = innerVal.split(value.splitBy);
                                                    if (splitedVals.length) {
                                                        if (value.setTo) {
                                                            $.each(value.setTo, function(key, value) {
                                                                var elemSplitedName = value;
                                                                jQuery("input[name='" + elemSplitedName + "']").each(function() {
                                                                    var thisElem = this;
                                                                    $(thisElem).val(splitedVals[key])
                                                                });
                                                                jQuery("select[name='" + elemSplitedName + "']").each(function() {
                                                                    var thisElem = this;
                                                                    $(thisElem).val(splitedVals[key])
                                                                });
                                                                jQuery("textarea[name='" + elemSplitedName + "']").each(function() {
                                                                    var thisElem = this;
                                                                    $(thisElem).val(splitedVals[key])
                                                                });
                                                                jQuery("button[name='" + elemSplitedName + "']").each(function() {
                                                                    var thisElem = this;
                                                                    $(thisElem).val(splitedVals[key])
                                                                })
                                                            })
                                                        }
                                                    }
                                                }
                                                if (value.convertTo) {
                                                    $.each(value.convertTo, function(key, value) {
                                                        if (innerVal == key) {
                                                            $(elemThis).val(innerVal)
                                                        }
                                                    })
                                                }
                                                if (value.formatAfter) {
                                                    if (value.formatAfter.type == 'date') {
                                                        var formatedVal = moment(innerVal).format(value.formatAfter.format);
                                                        $(elemThis).val(formatedVal)
                                                    }
                                                }
                                            } else {
                                                if (!isPresent) {
                                                    $(elemThis).val(innerVal)
                                                }
                                            }
                                        })
                                    } else {
                                        $(elemThis).val(innerVal)
                                    }
                                }
                            }
                        });
                        jQuery("textarea[name='" + elemName + "']").each(function() {
                            var elemThis = this;
                            var innerVal = getElemValueByObj(opts.prefillFormData[0], elemName);
                            if (innerVal != null) {
                                if (innerVal.indexOf("no_") == -1) {
                                    if (opts.rules.length) {
                                        var isPresent = !1;
                                        $.each(opts.rules, function(key, value) {
                                            if (value.elementName == elemName) {
                                                isPresent = !0;
                                                if (value.splitBy) {
                                                    var splitedVals = innerVal.split(value.splitBy);
                                                    if (splitedVals.length) {
                                                        if (value.setTo) {
                                                            $.each(value.setTo, function(key, value) {
                                                                var elemSplitedName = value;
                                                                jQuery("input[name='" + elemSplitedName + "']").each(function() {
                                                                    var thisElem = this;
                                                                    $(thisElem).val(splitedVals[key])
                                                                });
                                                                jQuery("select[name='" + elemSplitedName + "']").each(function() {
                                                                    var thisElem = this;
                                                                    $(thisElem).val(splitedVals[key])
                                                                });
                                                                jQuery("textarea[name='" + elemSplitedName + "']").each(function() {
                                                                    var thisElem = this;
                                                                    $(thisElem).val(splitedVals[key])
                                                                });
                                                                jQuery("button[name='" + elemSplitedName + "']").each(function() {
                                                                    var thisElem = this;
                                                                    $(thisElem).val(splitedVals[key])
                                                                })
                                                            })
                                                        }
                                                    }
                                                }
                                                if (value.convertTo) {
                                                    $.each(value.convertTo, function(key, value) {
                                                        if (innerVal == key) {
                                                            $(elemThis).val(innerVal)
                                                        }
                                                    })
                                                }
                                                if (value.formatAfter) {
                                                    if (value.formatAfter.type == 'date') {
                                                        var formatedVal = moment(innerVal).format(value.formatAfter.format);
                                                        $(elemThis).val(formatedVal)
                                                    }
                                                }
                                            } else {
                                                if (!isPresent) {
                                                    $(elemThis).val(innerVal)
                                                }
                                            }
                                        })
                                    } else {
                                        $(elemThis).val(innerVal)
                                    }
                                }
                            }
                        });
                        jQuery("button[name='" + elemName + "']").each(function() {
                            var elemThis = this;
                            var innerVal = getElemValueByObj(opts.prefillFormData[0], elemName);
                            if (innerVal != null) {
                                if (innerVal.indexOf("no_") == -1) {
                                    if (opts.rules.length) {
                                        var isPresent = !1;
                                        $.each(opts.rules, function(key, value) {
                                            if (value.elementName == elemName) {
                                                isPresent = !0;
                                                if (value.splitBy) {
                                                    var splitedVals = innerVal.split(value.splitBy);
                                                    if (splitedVals.length) {
                                                        if (value.setTo) {
                                                            $.each(value.setTo, function(key, value) {
                                                                var elemSplitedName = value;
                                                                jQuery("input[name='" + elemSplitedName + "']").each(function() {
                                                                    var thisElem = this;
                                                                    $(thisElem).val(splitedVals[key])
                                                                });
                                                                jQuery("select[name='" + elemSplitedName + "']").each(function() {
                                                                    var thisElem = this;
                                                                    $(thisElem).val(splitedVals[key])
                                                                });
                                                                jQuery("textarea[name='" + elemSplitedName + "']").each(function() {
                                                                    var thisElem = this;
                                                                    $(thisElem).val(splitedVals[key])
                                                                });
                                                                jQuery("button[name='" + elemSplitedName + "']").each(function() {
                                                                    var thisElem = this;
                                                                    $(thisElem).val(splitedVals[key])
                                                                })
                                                            })
                                                        }
                                                    }
                                                }
                                                if (value.convertTo) {
                                                    $.each(value.convertTo, function(key, value) {
                                                        if (innerVal == key) {
                                                            $(elemThis).val(innerVal)
                                                        }
                                                    })
                                                }
                                                if (value.formatAfter) {
                                                    if (value.formatAfter.type == 'date') {
                                                        var formatedVal = moment(innerVal).format(value.formatAfter.format);
                                                        $(elemThis).val(formatedVal)
                                                    }
                                                }
                                            } else {
                                                if (!isPresent) {
                                                    $(elemThis).val(innerVal)
                                                }
                                            }
                                        })
                                    } else {
                                        $(elemThis).val(innerVal)
                                    }
                                }
                            }
                        })
                    }
                })
            }
        }
    };
    $.fn.pyxleForms.defaults = {
        prefillFormData: null,
        autoUpdate: !0,
        autoUpdateEvery: 20,
        rules: []
    }
})(jQuery);

function getElemValueByObj(obj, elem) {
    var val = null;
	if(typeof obj != 'undefined' && obj != null){
		jQuery.each(obj, function(index, item) {
			if (index == elem) {
				val = item
			}
		});
	}
    return val
}

function isElemValueInObj(obj, elem) {
    var val = null;
	if(typeof obj != 'undefined' && obj != null){
		jQuery.each(obj, function(index, item) {
			if (item.name == elem) {
				val = item
			}
		});
	}
    return val
}

function diffObjElems(obj1, obj2) {
    var elemArr = [];
	if(typeof obj1 != 'undefined' && obj1 != null){
		jQuery.each(obj1, function(key, value) {
			var elemName = value.name;
			if (isElemValueInObj(obj2, elemName) == null) {
				elemArr.push(value)
			}
		});
	}
    return elemArr
}