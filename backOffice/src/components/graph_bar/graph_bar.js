import React, { useEffect, useRef } from 'react';
import * as d3 from 'd3';

export const Graph_Bar = ({ data, total }) => {
    const ref = useRef();

    useEffect(() => {
        const divs = d3.select(ref.current)
            .selectAll("div")
            .attr("class", "graphBar__container")
            .data(data)
            .enter()
            .append("div");

        divs.style("width", d => `${(d.value/total) * 100}px`)
            .attr("class", "graphBar__element")
            .style("height", "20px")
            .style("background-color", "steelblue")
            .select("::after")
            .style("content", d => d.key);
    }, [data]);

    return <div ref={ref}></div>;
};