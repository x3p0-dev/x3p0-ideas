# Font Sizes

## Base < Smallest Scale

- https://www.fluid-type-scale.com/calculate?minFontSize=17&minWidth=480&minRatio=1.125&maxFontSize=19&maxWidth=1024&maxRatio=1.125&steps=2xs%2Cxs%2Csm%2Cbase%2Clg%2Cxl%2C2xl%2C3xl%2C4xl%2C5xl%2C6xl%2C7xl&baseStep=base&prefix=font-size&decimals=4&useRems=on&remValue=16&previewFont=Inter&previewText=Almost+before+we+knew+it%2C+we+had+left+the+ground&previewWidth=264

```scss
:root {
	--font-size-2xs: clamp(0.7462rem, 0.2582vw + 0.6688rem, 0.834rem);
	--font-size-xs: clamp(0.8395rem, 0.2905vw + 0.7524rem, 0.9383rem);
	--font-size-sm: clamp(0.9444rem, 0.3268vw + 0.8464rem, 1.0556rem);
}
```

## Base > Largest Scale

- https://www.fluid-type-scale.com/calculate?minFontSize=17&minWidth=480&minRatio=1.125&maxFontSize=19&maxWidth=1024&maxRatio=1.25&steps=2xs%2Cxs%2Csm%2Cbase%2Clg%2Cxl%2C2xl%2C3xl%2C4xl%2C5xl%2C6xl%2C7xl&baseStep=base&prefix=font-size&decimals=4&useRems=on&remValue=16&previewFont=Inter&previewText=Almost+before+we+knew+it%2C+we+had+left+the+ground&previewWidth=264

```scss
:root {
	--font-size-base: clamp(1.0625rem, 0.3676vw + 0.9522rem, 1.1875rem);
	--font-size-lg: clamp(1.1953rem, 0.8502vw + 0.9403rem, 1.4844rem);
	--font-size-xl: clamp(1.3447rem, 1.5022vw + 0.8941rem, 1.8555rem);
	--font-size-2xl: clamp(1.5128rem, 2.3721vw + 0.8012rem, 2.3193rem);
	--font-size-3xl: clamp(1.7019rem, 3.5213vw + 0.6455rem, 2.8992rem);
	--font-size-4xl: clamp(1.9147rem, 5.0274vw + 0.4065rem, 3.624rem);
	--font-size-5xl: clamp(2.154rem, 6.9881vw + 0.0576rem, 4.53rem);
	--font-size-6xl: clamp(2.4232rem, 9.5271vw + -0.4349rem, 5.6624rem);
	--font-size-7xl: clamp(2.7261rem, 12.7997vw + -1.1138rem, 7.0781rem);
}
```
