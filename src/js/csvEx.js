/* 
 * Author: Steven Bohm
 * Copyright 2011 Synetics GmbH Düsseldorf
 */

function csvexport()
{
    alert(
    $('#inhalte').table2csv({
        dilimiter: ';',
        callback: function(csv){
            return csv;
            
        }
                            })
    );
}

