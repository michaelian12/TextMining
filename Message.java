#set( $symbol_pound = '#' )
#set( $symbol_dollar = '$' )
#set( $symbol_escape = '\' )
package ${groupId}.${artifactId};

public class ${data} implements java.io.Serializable
{
    private String ${artifactId};

    public ${data}()
    {
    }

    public String get${data}() { return ${artifactId}; }
}