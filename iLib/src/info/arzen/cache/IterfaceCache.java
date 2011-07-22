package info.arzen.cache;

public interface IterfaceCache {
    public String get(String key) ;
    public void set(String key, String data) ;
    public boolean exists(String key) ;

}
